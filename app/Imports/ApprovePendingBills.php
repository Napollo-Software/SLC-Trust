<?php
namespace App\Imports;

use App\Jobs\sendEmailJob;
use App\Models\Category;
use App\Models\Claim;
use App\Models\Notifcation;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ApprovePendingBills implements ToCollection, WithHeadingRow, WithStartRow
{
    public function collection(Collection $collection)
    {
        Validator::make($collection->toArray(), [
            '*.bill_id'                                                          => 'required',
            '*.user'                                                             => 'required',
            '*.date'                                                             => 'required',
            '*.category'                                                         => 'required',
            '*.status_you_can_either_approved_partially_approve_or_reject_bills' => 'required',
            '*.bill_amount'                                                      => 'required',
            '*.user_balance'                                                     => 'required',
        ]);

        $app_name = config('app.professional_name');
        $admin    = User::findOrFail(\Company::Account_id);

        foreach ($collection as $item) {
            if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] != "Pending") {

                $claim = Claim::find($item['bill_id']);

                if ($claim && $claim->claim_user != null) {

                    $claim->payment_method = $item['payment_method_achcardcheck_payment'];
                    $claim->card_number    = $item['payment_number'];
                    $claim->account_number = str_replace('A.C#', '', $item['account']);

                    $user     = User::find($claim->claim_user);
                    $category = Category::find($claim->claim_category);

                    $userBalance  = userBalance($user->id);
                    $userBalance = ($userBalance == "N/A") ? '0' : $userBalance;

                    if ($claim->claim_status == "Pending") {

                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Approved' && $item['paid_amount'] == $claim->claim_amount) {
                            DB::beginTransaction();

                            try {
                                $claim->claim_status = 'Approved';
                                $claim->save();

                                $user->save();

                                $reference_id = generateTransactionId();

                                $user->transactions()->create([
                                    'status'           => 1,
                                    'bill_id'          => $claim->id,
                                    "reference_id"     => $reference_id,
                                    'debit'            => $claim->claim_amount,
                                    'payment_method'   => $claim->payment_method,
                                    'payment_number'   => $claim->card_number,
                                    'transaction_type' => \TransactionType::TrustedSurplus,
                                    'description'      => "{$app_name} has processed payment against bill submitted for {$category->category_name} category.",
                                ]);

                                $admin->transactions()->create([
                                    "status"           => 1,
                                    "bill_id"          => $claim->id,
                                    "reference_id"     => $reference_id,
                                    "credit"           => $claim->claim_amount,
                                    "payment_method"   => $claim->payment_method,
                                    "payment_number"   => $claim->payment_number,
                                    "transaction_type" => \TransactionType::TrustedSurplus,
                                    "description"      => "{$app_name} has processed {$user->name} {$user->last_name}'s payment against bill submitted for {$category->category_name} category.",
                                ]);

                                Notifcation::create([
                                    'user_id'     => $user->id,
                                    'name'        => $user->name,
                                    'bill_id'     => $claim->id,
                                    'description' => "Your Bill #{$claim->id} with \${$claim->claim_amount} amount added on " . date('m/d/Y', strtotime($claim->created_at)) . " has been approved successfully.",
                                    'title'       => 'Bill Approved',
                                    'status'      => 0,
                                ]);

                                DB::commit();
                            } catch (\Exception $e) {
                                DB::rollBack();
                                \Log::error('Error processing claim: ' . $e->getMessage());
                                return response()->json(['error' => 'Something went wrong'], 500);
                            }

                            $subject       = "Bill Approved";
                            $name          = "{$user->name} {$user->last_name}";
                            $email_message = "Your bill#{$user->id} added on " . date('m-d-Y', strtotime($user->created_at)) . " has been Approved. Please use the button below to find the details of your bill:";
                            $url           = ("/claims/{$claim->id}");

                            if ($user->notify_by == "email" || $category->category_name != "Melody") {
                                SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                            }
                        }
                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Partially Approve' && $item['paid_amount'] <= $claim->claim_amount) {
                            
                            DB::beginTransaction();

                            try {

                                $claim->claim_status   = "Partially approved";
                                $claim->partial_amount = $item['paid_amount'];
                                $claim->save();
                                $reference_id = generateTransactionId();

                                $user->transactions()->create([
                                    'status'           => 1,
                                    'bill_id'          => $claim->id,
                                    'reference_id'     => $reference_id,
                                    'debit'            => $item['paid_amount'],
                                    'payment_number'   => $claim->card_number,
                                    'payment_method'   => $claim->payment_method,
                                    'transaction_type' => \TransactionType::TrustedSurplus,
                                    'description'      => "{$app_name} has processed payment against bill submitted for {$category->category_name} category.",
                                ]);

                                $admin->transactions()->create([
                                    'status'           => 1,
                                    'bill_id'          => $claim->id,
                                    'reference_id'     => $reference_id,
                                    'credit'           => $item['paid_amount'],
                                    'payment_number'   => $claim->card_number,
                                    'payment_method'   => $claim->payment_method,
                                    'transaction_type' => \TransactionType::TrustedSurplus,
                                    'description'      => "{$app_name} has processed {$user->name} {$user->last_name}'s payment against bill submitted for {$category->category_name} category.",
                                ]);

                                Notifcation::create([
                                    'status'      => 0,
                                    'bill_id'     => $claim->id,
                                    'name'        => $user->name,
                                    'user_id'     => $user->id,
                                    'title'       => 'Partically approved',
                                    'description' => "Your Bill # {$claim->id} with ${$claim->claim_amount} amount added on " . date('m/d/Y', strtotime(now())) . " has been partically approved with amount ${$claim->partial_amount}.",
                                ]);

                                DB::commit();
                            } 
                            catch (\Exception $e) {
                                DB::rollBack();
                                \Log::error("Error processing claim: {$e}");
                                return response()->json(['error' => 'Something went wrong'], 500);
                            }

                            $name = "{$user->name} {$user->last_name}";

                            $url = "/claims/$claim->id";

                            $subject       = "Bill Partially Approved";
                            $name          = "{$user->name} {$user->last_name}";
                            $email_message = "Your bill#{$user->id} added on " . date('m-d-Y', strtotime($user->created_at)) . " has been Partially Approved. Please use the button below to find the details of your bill:";
                            $url           = url("/claims/{$claim->id}");
                            if ($user->notify_by == "email" || $category->category_name != "Melody") {
                                SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                            }
                        }
                        if ($item['status_you_can_either_approved_partially_approve_or_reject_bills'] == 'Reject') {
                            $claim->claim_status = "Refused";
                            $claim->save();

                            $bill_message = "Your Bill # {$claim->id} with \${$claim->claim_amount} amount added on " . date('m/d/Y', strtotime(now())) . " has been refused. Reason: {$claim->refusal_reason}";

                            Notifcation::create([
                                'status'      => 0,
                                'bill_id'     => $claim->id,
                                'title'       => 'Bill Refused',
                                'name'        => $user->name,
                                'user_id'     => $user->id,
                                'description' => $bill_message,
                            ]);

                            $subject       = "Bill Refused";
                            $name          = "{$user->name} {$user->last_name}";
                            $email_message = "Your Bill # {$claim->id} with \${$claim->claim_amount} amount added on " . date('m/d/Y', strtotime(now())) . " has been refused. Reason: {$claim->refusal_reason}";
                            $url           = url("/claims/{$claim->id}");
                            if ($user->notify_by == "email" || $category->category_name != "Melody") {
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
