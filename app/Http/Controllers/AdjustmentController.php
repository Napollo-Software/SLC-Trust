<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Jobs\sendEmailJob;
use App\Models\Notifcation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdjustmentController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'User')->get();
        return view('adjustments.index', compact('users'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:debit,credit',
            'user' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:0.01',
            'details' => 'required|string'
        ], [
            'user.required' => 'Please select a user to create an adjustment.'
        ]);

        $admin = User::find(\Company::Account_id);

        $user = User::find($validated['user']);

        $userBalance = userBalance($user->id);

        $app_name = config('app.name');

        if ($validated['type'] == 'debit' && $userBalance < $validated['amount']) {
            return response()->json(['type' => 0, 'message' => "{$user->name} {$user->last_name}'s balance of \${$userBalance} is insufficient."]);
        }

        DB::beginTransaction();
        try {

            $transactionType = $validated['type'];
            $adminDirection = $transactionType === 'credit' ? 'debit' : 'credit';
            $admin_message = "Adjustment : {$app_name} has processed an adjustment entry to {$transactionType} amount \${$request->amount} for {$user->name} {$user->last_name}. Transaction reason: '{$request->details}'.";
            $user_message = "Adjustment : Account has been {$transactionType}ed by amount \${$request->amount}. Transaction reason: '{$request->details}'.";
            $subject = $transactionType === 'credit' ? 'Balance Added' : 'Balance Deducted';

            $reference_id = generateTransactionId();

            if ($transactionType == 'debit') {

                $user->transactions()->create([
                    'status' => 1,
                    $transactionType => $validated['amount'],
                    'description' => $user_message,
                    'reference_id' => $reference_id,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                ]);

                $admin->transactions()->create([
                    'status' => 1,
                    $adminDirection => $validated['amount'],
                    'description' => $admin_message,
                    'reference_id' => $reference_id,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                ]);

            } else {

                $admin->transactions()->create([
                    'status' => 1,
                    $adminDirection => $validated['amount'],
                    'description' => $admin_message,
                    'reference_id' => $reference_id,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                ]);

                $user->transactions()->create([
                    'status' => 1,
                    $transactionType => $validated['amount'],
                    'description' => $user_message,
                    'reference_id' => $reference_id,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                ]);
            }

            Notifcation::create([
                'user_id' => $user->id,
                'name' => $user->name,
                'description' => $user_message,
                'title' => $subject,
                'status' => 0,
            ]);

            DB::commit();
            return response()->json(['type' => 1, 'message' => 'Adjustment has been created successfully.']);
        } catch (\Exception $e) {
            DB::rollback();
            errorLogs($e->getMessage());
            return response()->json(['type' => 0, 'message' => 'Failed to create adjustment: ' . $e->getMessage()]);
        }
    }


}
