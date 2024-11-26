<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Models\Claim;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Notifcation;
use App\Jobs\sendEmailJob;
use Illuminate\Support\Facades\Validator;

class ApprovePendingBills implements ToCollection, WithHeadingRow, WithStartRow
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        // dd($collection);
        Validator::make($collection->toArray(), [
            '*.bill_id' => 'required',
            '*.user' => 'required',
            '*.date' => 'required',
            '*.category' => 'required',
            '*.status_you_can_either_approved_partially_approve_or_reject_bills' => 'required',
            '*.bill_amount' => 'required',
            '*.user_balance' => 'required',
        ]);

        $app_name = config('app.professional_name');

        foreach ($collection as $k => $item) {
            // dd($item);
            // if($k>0)
            if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] != "Pending") {
                $claim = Claim::find($item['bill_id']);
                if ($claim && $claim->claim_user != null) {
                    $claim->payment_method = $item['payment_method_achcardcheck_payment'];
                    $claim->card_number = $item['payment_number'];
                    $user = User::find($claim->claim_user);
                    if ($claim->claim_status == "Pending") {
                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Approved' && $item['paid_amount'] == $claim->claim_amount && $user->user_balance >= $claim->claim_amount) {
                            $claim->claim_status = "Approved";
                            $claim->save();
                            $user->user_balance = $user->user_balance - $claim->claim_amount;
                            $user->save();
                            ////////////////Customer Ledger/////////////////
                            $transaction = new Transaction();
                            $transaction->user_id = $user->id;
                            $transaction->bill_id = $claim->id;
                            $transaction->name = $user->name;
                            $transaction->last_name = $user->last_name;
                            $transaction->deduction = $claim->claim_amount;
                            $transaction->cbalance = $user->user_balance;
                            // $transaction->payment_method=$request->payment_method;
                            // $transaction->payment_number=$request->card_number;
                            $transaction->transaction_type = "Trusted Surplus";
                            $transaction->statusamount = "debit";
                            $transaction->description = "{$app_name} has processed payment against bill submitted for " . $item['category'] . " category.";
                            $transaction->bill_status = 'Deducted';
                            $transaction->status = 1;
                            $transaction->save();
                            //////////////// Admin Ledger/////////////////
                            $transaction = new Transaction();
                            $transaction->chart_of_account = \Company::Account_id;
                            $transaction->bill_id = $claim->id;
                            $transaction->user_id = $user->id;
                            $transaction->deduction = $claim->claim_amount;
                            // $transaction->payment_method=$request->payment_method;
                            // $transaction->payment_number=$request->card_number;
                            $transaction->transaction_type = "Trusted Surplus";
                            $transaction->statusamount = "debit";
                            $transaction->description = "{$app_name} has processed " . $user->name . " " . $user->last_name . "'s payment against bill submitted for " . $item['category'] . " category.";
                            $transaction->bill_status = 'Included';
                            $transaction->status = 1;
                            $transaction->save();
                            /////////////User Bill Approved Notification/////////////
                            $notifcation = new Notifcation();
                            $notifcation->user_id = $user->id;
                            $notifcation->name = $user->name;
                            $notifcation->bill_id = $claim->id;
                            $notifcation->description = "Your Bill # " . $claim->id . " with $" . $claim->claim_amount . " amount added on " . date('m/d/Y', strtotime($claim->created_at)) . " has been approved successfully.";
                            $notifcation->title = 'Bill Approved';
                            $notifcation->status = 0;
                            $notifcation->save();
                            $subject = "Bill Approved";
                            $name = $user->name . ' ' . $user->last_name;
                            $email_message = "Your bill#" . $user->id . " added on " . date('m-d-Y', strtotime($user->created_at)) . " has been Approved. Please use the button below to find the details of your bill:";
                            $url = ("/claims/{$claim->id}");
                            if ($user->notify_by == "email") {
                                SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                            }
                        }
                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Partially Approve' && $item['paid_amount'] <= $claim->claim_amount && $user->user_balance >= $item['paid_amount']) {
                            $claim->claim_status = "Partially approved";
                            $claim->save();
                            $user->user_balance = $user->user_balance - $item['paid_amount'];
                            $user->save();
                            ////////////////Customer Ledger/////////////////
                            $transaction = new Transaction();
                            $transaction->user_id = $user->id;
                            $transaction->bill_id = $claim->id;
                            $transaction->name = $user->name;
                            $transaction->last_name = $user->last_name;
                            $transaction->deduction = $item['paid_amount'];
                            $transaction->cbalance = $user->user_balance;
                            // $transaction->payment_method=$request->payment_method;
                            // $transaction->payment_number=$request->card_number;
                            $transaction->transaction_type = "Trusted Surplus";
                            $transaction->statusamount = "debit";
                            $transaction->description = "{$app_name} has processed payment against bill submitted for " . $item['category'] . " category.";
                            $transaction->bill_status = 'Deducted';
                            $transaction->status = 1;
                            $transaction->save();
                            //////////////// Admin Ledger/////////////////
                            $transaction = new Transaction();
                            $transaction->chart_of_account = \Company::Account_id;
                            $transaction->bill_id = $claim->id;
                            $transaction->user_id = $user->id;
                            $transaction->deduction = $item['paid_amount'];
                            // $transaction->payment_method=$request->payment_method;
                            // $transaction->payment_number=$request->card_number;
                            $transaction->transaction_type = "Trusted Surplus";
                            $transaction->statusamount = "debit";
                            $transaction->description = "{$app_name} has processed " . $user->name . " " . $user->last_name . "'s payment against bill submitted for " . $item['category'] . " category.";
                            $transaction->bill_status = 'Included';
                            $transaction->status = 1;
                            $transaction->save();
                            /////////////User Bill Approved Notification/////////////
                            $notifcation = new Notifcation();
                            $notifcation->user_id = $user->id;
                            $notifcation->name = $user->name;
                            $notifcation->bill_id = $claim->id;
                            $notifcation->description = "Your Bill # " . $claim->id . " with $" . $claim->claim_amount . " amount added on " . date('m/d/Y', strtotime($claim->created_at)) . " has been Partially Approved successfully.";
                            $notifcation->title = 'Bill Partially Approved';
                            $notifcation->status = 0;
                            $notifcation->save();
                            $subject = "Bill Partially Approved";
                            $name = $user->name . ' ' . $user->last_name;
                            $email_message = "Your bill#" . $user->id . " added on " . date('m-d-Y', strtotime($user->created_at)) . " has been Partially Approved. Please use the button below to find the details of your bill:";
                            $url = url("/claims/{$claim->id}");
                            if ($user->notify_by == "email") {
                                SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                            }
                        }
                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Reject') {
                            $claim->claim_status = "Refused";
                            $claim->save();
                            /////////////User Bill Approved Notification/////////////
                            $notifcation = new Notifcation();
                            $notifcation->user_id = $user->id;
                            $notifcation->name = $user->name;
                            $notifcation->bill_id = $claim->id;
                            $notifcation->description = "Your Bill # " . $claim->id . " with $" . $claim->claim_amount . " amount added on " . date('m/d/Y', strtotime($claim->created_at)) . " has been Refused.";
                            $notifcation->title = 'Bill Refused';
                            $notifcation->status = 0;
                            $notifcation->save();
                            $subject = "Bill Refused";
                            $name = $user->name . ' ' . $user->last_name;
                            $email_message = "Your bill#" . $user->id . " added on " . date('m-d-Y', strtotime($user->created_at)) . " has been Refused. Please use the button below to find the details of your bill:";
                            $url = url("/claims/{$claim->id}");
                            if ($user->notify_by == "email") {
                                SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                            }
                        }
                    }
                }
            }
        }

    }
    public function startRow(): int
    {
        return 2;
    }
}
