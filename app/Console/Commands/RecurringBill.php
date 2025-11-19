<?php
namespace App\Console\Commands;

use App\Jobs\sendEmailJob;
use App\Models\Category;
use App\Models\Claim;
use App\Models\Notifcation;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecurringBill extends Command
{

    protected $signature   = 'recurringbill:cron';
    protected $description = 'Ledger generated for recurring bills';
    public function handle()
    {
        try
        {
            DB::beginTransaction();

            $currentMonth = Carbon::now()->format('Y-m');

            $claims = Claim::where('recurring_bill', 1)->where(function ($query) {
                $query->where('claim_status', 'Approved')->orwhere('claim_status', 'Partially approved');
            })
                ->whereNotIn('id', function ($query) use ($currentMonth) {
                    $query->select('recurred')->from('claims')->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$currentMonth])->whereNull('deleted_at');
                })
                ->with(['category', 'user'])->get();

            $adminNotifications = User::where('role', 'Admin')->get();

            $ignoreAdminNotification = ['admin@napollo.net'];

            foreach ($claims as $claim) {

                $claimUser = $claim->user;
                $category  = $claim->category;

                $currentDate = Carbon::now();
                $claimDate   = Carbon::parse($claim->created_at);

                $currentDay = $currentDate->day;
                $claimDay   = $claimDate->day;

                $shouldRecur = false;

                if ($currentDay + 1 == $claimDay) {
                    $shouldRecur = true;
                }

                if ($currentDay == 1 && in_array($claimDay, [1, 2])) {
                    $shouldRecur = true;
                }

                if ($currentDate->isLastOfMonth() && $claimDay > $currentDay) {
                    $shouldRecur = true;
                }

                if ($shouldRecur) {

                    $claim                     = Claim::find($claim->id);
                    $new_claim                 = $claim->replicate();
                    $new_claim->claim_status   = "Pending";
                    $new_claim->partial_amount = null;
                    $new_claim->recurring_bill = 0;
                    $new_claim->recurred       = $claim->id;
                    $new_claim->recurring_day  = null;
                    $new_claim->save();

                    Log::info("Recurring bill #" . $new_claim->id . " against Bill# " . $claim->id . "is duplicated successfully on " . date('d-m-y', strtotime(now())));
                    /////////////User Bill Notification/////////////
                    $notifcation              = new Notifcation();
                    $notifcation->user_id     = $claimUser->id;
                    $notifcation->name        = $claimUser->name;
                    $notifcation->bill_id     = $claim->id;
                    $notifcation->description = 'Your recurring bill#' . $new_claim->id . ' has been created successfully against ' . $category->category_name . ' category.';
                    $notifcation->title       = 'Bill Created';
                    $notifcation->status      = 0;
                    $notifcation->save();

                    foreach ($adminNotifications as $notify) {
                        if (! in_array($notify->email, $ignoreAdminNotification)) {

                            $notifcation              = new Notifcation();
                            $notifcation->user_id     = $notify->id;
                            $notifcation->name        = $claimUser->name;
                            $notifcation->bill_id     = $claim->id;
                            $notifcation->description = $claimUser->name . ' ' . $claimUser->last_name . "'s recurring bill#" . $new_claim->id . " has been created and waiting for approval.";
                            $notifcation->title       = 'Bill Created';
                            $notifcation->status      = 0;
                            $notifcation->save();
                            $subject       = "Bill Created";
                            $name          = $notify->name . ' ' . $notify->last_name;
                            $email_message = $claimUser->name . ' ' . $claimUser->last_name . "'s recurring bill#" . $new_claim->id . " has been created and waiting for approval. Please use the button below to find the details of the bill:";
                            $url           = url("/claims/{$new_claim->id}");
                            if ($notify->notify_by == "email") {
                                SendEmailJob::dispatch($notify->email, $subject, $name, $email_message, $url);
                            }
                        }
                    }
                }
            }

            Log::info("Recurring bill Job is completed successfully on " . date('d-m-y', strtotime(now())));

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::error("Something went wrong: " . $e->getMessage(), ["Exception" => $e]);
        }
    }
}
