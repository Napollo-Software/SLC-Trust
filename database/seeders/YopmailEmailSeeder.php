<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Throwable;

/**
 * Sanitize a copied/live database for safe local testing:
 * - rewrite contact emails to *@yopmail.com
 * - reset user passwords / clear tokens
 * - clear queues/sessions that may still hold real emails
 *
 * Run: php artisan db:seed --class=YopmailEmailSeeder
 */
class YopmailEmailSeeder extends Seeder
{
    /** Columns that look like emails but must not be rewritten. */
    protected array $emailColumnExclusions = [
        'email_status',
    ];

    /**
     * Explicit SLC-Trust email columns (used if auto-detect misses anything).
     * table => [columns]
     */
    protected array $knownEmailColumns = [
        'users' => ['email'],
        'contacts' => ['email'],
        'leads' => ['contact_email', 'patient_email'],
        'physicians' => ['email'],
        'referrals' => ['email'],
        // Extra vs basic SQL list — real email column in this project
        'emergency_contacts' => ['emergency_email'],
    ];

    public function run(): void
    {
        if (! $this->takeDatabaseBackup()) {
            return;
        }

        DB::disableQueryLog();

        $usersSanitized = $this->sanitizeUsers();
        $emailsUpdated = $this->rewriteAllEmails();
        $cleared = $this->clearEphemeralTables();

        $this->command->info('YopmailEmailSeeder finished.');
        $this->command->info("  Users sanitized: {$usersSanitized}");
        $this->command->info("  Email fields rewritten: {$emailsUpdated}");
        $this->command->info('  Cleared: '.implode(', ', $cleared ?: ['(none)']));
        $this->command->warn('All rewritten emails use *@yopmail.com. Default password for users: 12345678');
    }

    protected function takeDatabaseBackup(): bool
    {
        $this->command->info('Creating database backup before rewriting emails...');

        try {
            $connection = config('database.default');
            $db = config("database.connections.{$connection}");

            if (($db['driver'] ?? null) !== 'mysql') {
                $this->command->error('YopmailEmailSeeder backup currently supports MySQL only. Aborting.');

                return false;
            }

            $backupDir = storage_path('app/backups');
            if (! is_dir($backupDir) && ! mkdir($backupDir, 0755, true) && ! is_dir($backupDir)) {
                $this->command->error("Unable to create backup directory: {$backupDir}");

                return false;
            }

            $filename = sprintf(
                '%s_%s_%s.sql',
                $db['database'],
                date('Y-m-d_His'),
                Str::random(6)
            );
            $path = $backupDir.DIRECTORY_SEPARATOR.$filename;

            $mysqldump = $this->resolveMysqlDumpBinary();
            if ($mysqldump === null) {
                $this->command->error('mysqldump was not found on PATH. Install MySQL client tools or add mysqldump to PATH, then re-run.');

                return false;
            }

            $command = sprintf(
                '%s --host=%s --port=%s --user=%s %s %s > %s',
                escapeshellarg($mysqldump),
                escapeshellarg((string) $db['host']),
                escapeshellarg((string) ($db['port'] ?? 3306)),
                escapeshellarg((string) $db['username']),
                $db['password'] !== null && $db['password'] !== ''
                    ? '--password='.escapeshellarg((string) $db['password'])
                    : '--password=',
                escapeshellarg((string) $db['database']),
                escapeshellarg($path)
            );

            $output = [];
            $exitCode = 0;
            exec($command.' 2>&1', $output, $exitCode);

            if ($exitCode !== 0 || ! is_file($path) || filesize($path) === 0) {
                $this->command->error('Database backup failed. Email rewrite aborted.');
                if ($output !== []) {
                    $this->command->line(implode(PHP_EOL, $output));
                }

                return false;
            }

            $this->command->info("Database backup saved to: {$path}");

            // mysqldump via exec can leave the PDO connection in a bad state on Windows.
            DB::reconnect();

            return true;
        } catch (Throwable $exception) {
            $this->command->error('Database backup failed: '.$exception->getMessage());

            return false;
        }
    }

    protected function resolveMysqlDumpBinary(): ?string
    {
        $candidates = ['mysqldump'];

        if (PHP_OS_FAMILY === 'Windows') {
            $candidates[] = 'C:\\Program Files\\MySQL\\MySQL Server 8.0\\bin\\mysqldump.exe';
            $candidates[] = 'C:\\Program Files\\MySQL\\MySQL Server 8.4\\bin\\mysqldump.exe';
            $candidates[] = 'C:\\xampp\\mysql\\bin\\mysqldump.exe';
            $candidates[] = 'C:\\laragon\\bin\\mysql\\mysql-8.0.30-winx64\\bin\\mysqldump.exe';
        }

        foreach ($candidates as $binary) {
            $output = [];
            $code = 0;
            exec(escapeshellarg($binary).' --version 2>&1', $output, $code);
            if ($code === 0) {
                return $binary;
            }
        }

        return null;
    }

    protected function sanitizeUsers(): int
    {
        if (! $this->tableExists('users')) {
            $this->command->warn('Skipping users sanitization: users table not found.');

            return 0;
        }

        $columns = array_fill_keys($this->listColumns('users'), true);
        $updates = [];

        if (isset($columns['password'])) {
            $updates['password'] = Hash::make('12345678');
        }

        foreach (['token', 'remember_token'] as $column) {
            if (isset($columns[$column])) {
                $updates[$column] = null;
            }
        }

        if ($updates === []) {
            $this->command->warn('Skipping users sanitization: no applicable columns found.');

            return 0;
        }

        $count = DB::table('users')->count();
        DB::table('users')->update($updates);

        return $count;
    }

    protected function rewriteAllEmails(): int
    {
        $targets = $this->discoverEmailColumns();
        $updated = 0;

        foreach ($targets as $table => $columns) {
            foreach ($columns as $column) {
                $count = $this->rewriteEmailColumn($table, $column);
                if ($count > 0) {
                    $this->command->info("Rewrote {$count} value(s) in {$table}.{$column}");
                }
                $updated += $count;
            }
        }

        if ($targets === []) {
            $this->command->warn('No email columns found to rewrite.');
        }

        return $updated;
    }

    /**
     * @return array<string, list<string>>
     */
    protected function discoverEmailColumns(): array
    {
        $discovered = $this->knownEmailColumns;

        foreach ($this->listTables() as $table) {
            if (in_array($table, ['migrations', 'jobs', 'failed_jobs', 'sessions'], true)) {
                continue;
            }

            foreach ($this->listColumns($table) as $column) {
                if (in_array($column, $this->emailColumnExclusions, true)) {
                    continue;
                }

                if (stripos($column, 'email') === false) {
                    continue;
                }

                if (strcasecmp($column, 'email_status') === 0) {
                    continue;
                }

                $discovered[$table] = $discovered[$table] ?? [];
                if (! in_array($column, $discovered[$table], true)) {
                    $discovered[$table][] = $column;
                }
            }
        }

        $existingTables = array_fill_keys($this->listTables(), true);

        // Keep only tables/columns that actually exist.
        $valid = [];
        foreach ($discovered as $table => $columns) {
            if (! isset($existingTables[$table])) {
                $this->command->warn("Skipping {$table}: table not found.");
                continue;
            }

            $existingColumns = array_fill_keys($this->listColumns($table), true);

            foreach ($columns as $column) {
                if (! isset($existingColumns[$column])) {
                    $this->command->warn("Skipping {$table}.{$column}: column not found.");
                    continue;
                }
                $valid[$table][] = $column;
            }
        }

        return $valid;
    }

    protected function rewriteEmailColumn(string $table, string $column): int
    {
        $primaryKey = $this->primaryKey($table);
        $updated = 0;

        // Tables without a usable PK (e.g. password_resets): truncate instead.
        if ($primaryKey === null) {
            if ($table === 'password_resets') {
                DB::table($table)->delete();
                $this->command->info('Cleared password_resets (no id column to rewrite safely).');
            } else {
                $this->command->warn("Skipping {$table}.{$column}: no primary key found.");
            }

            return 0;
        }

        $query = DB::table($table)->whereNotNull($column)->where($column, '!=', '');

        foreach (['%@yopmail.com', '%@bookboll.com'] as $domain) {
            $query->where($column, 'not like', $domain);
        }

        $query->orderBy($primaryKey)
            ->chunkById(500, function ($rows) use ($table, $column, $primaryKey, &$updated) {
                foreach ($rows as $row) {
                    $current = (string) $row->{$column};
                    if ($current === '' || Str::endsWith(Str::lower($current), '@yopmail.com')) {
                        continue;
                    }

                    $localPart = Str::before($current, '@');
                    if ($localPart === '' || $localPart === $current) {
                        $localPart = $table.'_'.$column;
                    }

                    $localPart = Str::lower(preg_replace('/[^a-zA-Z0-9._-]+/', '_', $localPart) ?: 'user');
                    $localPart = trim($localPart, '._-') ?: 'user';

                    $newEmail = "{$localPart}_{$row->{$primaryKey}}@yopmail.com";

                    // Keep under typical varchar(255) limits.
                    if (strlen($newEmail) > 250) {
                        $newEmail = substr($localPart, 0, 80)."_{$row->{$primaryKey}}@yopmail.com";
                    }

                    DB::table($table)
                        ->where($primaryKey, $row->{$primaryKey})
                        ->update([$column => $newEmail]);

                    $updated++;
                }
            }, $primaryKey);

        return $updated;
    }

    protected function clearEphemeralTables(): array
    {
        $cleared = [];

        foreach ([
            'password_resets',
            'sessions',
            'personal_access_tokens',
            'jobs',
            'failed_jobs',
        ] as $table) {
            if (! $this->tableExists($table)) {
                continue;
            }

            DB::table($table)->delete();
            $cleared[] = $table;
        }

        return $cleared;
    }

    protected function tableExists(string $table): bool
    {
        return in_array($table, $this->listTables(), true);
    }

    /**
     * @return list<string>
     */
    protected function listTables(): array
    {
        $rows = DB::select('SHOW TABLES');

        return array_map(function ($row) {
            return array_values((array) $row)[0];
        }, $rows);
    }

    /**
     * @return list<string>
     */
    protected function listColumns(string $table): array
    {
        return array_map(function ($column) {
            return $column->Field;
        }, DB::select('SHOW COLUMNS FROM `'.$table.'`'));
    }

    protected function primaryKey(string $table): ?string
    {
        $columns = DB::select('SHOW COLUMNS FROM `'.$table.'`');

        foreach ($columns as $column) {
            if (strcasecmp((string) $column->Key, 'PRI') === 0) {
                return $column->Field;
            }
        }

        $columns = array_fill_keys($this->listColumns($table), true);
        if (isset($columns['id'])) {
            return 'id';
        }

        return null;
    }
}
