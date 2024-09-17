<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Notification;

class ChargeUserRenewal extends Command
{
    protected $signature = 'renewal:charge';

    protected $description = 'Charge users their renewal fee if due';


    public function handle()
    {
        $users = User::where("role", "User")
            ->where('next_renewal_at', '<=', Carbon::now())
            ->where('account_status', 'Approved')
            ->get();

        $admin = User::findOrFail(\Company::Account_id);

        foreach ($users as $user) {

            $renewalFee = 150;

            $userBalance = userBalance($user->id);

            if ($renewalFee > $userBalance) {
                $user->update(['account_status' => 'Suspended']);
                continue;
            }

            DB::beginTransaction();

            $reference_id = generateTransactionId();

            try {
                // Record user debit
                $user->transactions()->create([
                    "debit" => $renewalFee,
                    "description" => "Annual renewal fee charged.",
                    "type" => Transaction::RenewalFee,
                    "transaction_type" => \TransactionType::Operational,
                    "reference_id" => $reference_id,
                ]);

                // Credit the admin
                $admin->transactions()->create([
                    "credit" => $renewalFee,
                    "description" => "Received annual renewal fee from {$user->name}.",
                    "type" => Transaction::RenewalFee,
                    "transaction_type" => \TransactionType::Operational,
                    "reference_id" => $reference_id,
                ]);

                $user->update([
                    'last_renewal_at' => Carbon::now(),
                    'next_renewal_at' => Carbon::now()->addYear(),
                ]);

                DB::commit();

                Notification::create([
                    'status' => 0,
                    'user_id' => $user->id,
                    'title' => 'Renewal Charged',
                    'description' => "A renewal fee of \${$renewalFee} has been deducted.",
                ]);

            } catch (\Exception $e) {
                DB::rollback();
                errorLogs($e->getMessage());
            }
        }

        $this->info('Renewal fees charged to users due for renewal.');
    }
}
