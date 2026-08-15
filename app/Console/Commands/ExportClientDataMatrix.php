<?php

namespace App\Console\Commands;

use App\Services\ClientDataMatrixExporter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportClientDataMatrix extends Command
{
    protected $signature = 'export:client-data-matrix
                            {--all : Run every export step}
                            {--step= : One step: customers|bills|finance|reports|documents}
                            {--format=all : Output formats: all|excel|csv|pdf or combinations (excel,csv | excel,pdf | csv,pdf)}
                            {--path= : Output directory (default: storage/app/client_data_exports)}
                            {--pdf-limit=500 : Max rows included in a single PDF file}';

    protected $description = 'Export client data matrix files (Excel/CSV/PDF) for pitching and ongoing use';

    public function handle(): int
    {
        $step = $this->option('step');
        $all  = (bool) $this->option('all');

        if (! $all && empty($step)) {
            $this->error('Pass --all or --step=customers|bills|finance|reports|documents');
            $this->line('Optional: --format=all|excel|csv|pdf or excel,csv');
            return self::FAILURE;
        }

        try {
            DB::connection()->getPdo();
            $this->info('Database connection OK.');
        } catch (\Throwable $e) {
            $this->error('Database connection failed: ' . $e->getMessage());
            $this->line('Fix DB_* in .env, then re-run this command.');
            return self::FAILURE;
        }

        $outputPath = $this->option('path')
            ? (preg_match('/^[A-Za-z]:\\\\|^\//', $this->option('path'))
                ? $this->option('path')
                : base_path($this->option('path')))
            : storage_path('app/client_data_exports');
        $pdfLimit = (int) $this->option('pdf-limit');
        $formats  = $this->option('format') ?: 'all';

        try {
            $exporter = new ClientDataMatrixExporter($outputPath, $pdfLimit, $formats);
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        }

        $exporter->ensureOutputDirectory();

        $this->info('Output directory: ' . $exporter->getOutputPath());
        $this->info('Formats: ' . implode(', ', $exporter->getFormats()));

        try {
            if ($all) {
                $this->info('Running all steps...');
                $exporter->runAll();
            } else {
                $this->info("Running step [{$step}]...");
                $exporter->runStep($step);
                $exporter->writeReadme();
            }
        } catch (\InvalidArgumentException $e) {
            $this->error($e->getMessage());
            return self::FAILURE;
        } catch (\Throwable $e) {
            $this->error('Export failed: ' . $e->getMessage());
            $this->line($e->getFile() . ':' . $e->getLine());
            return self::FAILURE;
        }

        $this->newLine();
        $this->table(
            ['Status', 'File', 'Rows', 'Notes'],
            collect($exporter->getManifest())->map(function ($item) {
                return [
                    $item['status'] ?? 'ok',
                    $item['file'] ?? '',
                    $item['rows'] ?? 0,
                    $item['message'] ?? '',
                ];
            })->all()
        );

        $this->info('Done. See README.txt in the output folder.');

        return self::SUCCESS;
    }
}
