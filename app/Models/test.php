<?php
 function update(Request $request)
 {
     $id = $request->id;
     $app_name = config('app.professional_name');
     $request->validate(
         [
             'claim_status' => 'required',
             'recurring_day' => 'required_if:recurring_bill,1'
         ],
         [
             'claim_bill_attachment.error' => 'Bill attachment must be an image or pdf',
             'expense_date.required' => 'Due date is required ',
             'claim_status.required' => 'Bill cannot update with pending status',
             'recurring_day.required_if' => 'Please select billing cycle'
         ]
     );

     if ($request->claim_status == "Partial") {
         $request->validate([
             'partial_amount' => 'required|min:1',
             'reason' => 'required'
         ], [
             'partial_amount.required' => 'Partial amount is required ',
             'reason.required' => 'Please specify reason for partially approved bill'
         ]);
         $claim_amount = $request->partial_amount;
     } else {
         $claim_amount = $request->claim_amount;
     }
     if ($request->claim_status != "Refused") {
         $request->validate([
             'payment_method' => 'required',
             'card_number' => 'required',
         ], [
             'payment_method.required' => 'Payment method is required',
             'card_number.required' => 'Payment number is required'
         ]);
     }
     $name = Category::find($request->claim_category);
     $user = User::find(Session::get('loginId'));
     if ($request->has('claim_user')) {
         $claim_user = $request->claim_user;
     } else {
         $claim_user = $user->id;
     }
     $claimUser = User::find($claim_user);
     $intrustpit = User::find(7);
     if ($claimUser->user_balance < $claim_amount && $request->claim_status != 'Refused') {
         if ($user->role != 'User') {
             return response()->json(['header' => 'Insufficient balance!', 'type' => 'warning', 'message' => $claimUser->name . "'s balance is $" . $claimUser->user_balance . " which is insufficient to add this bill, Please add balance first."]);
         } else {
             Alert::warning('Insufficient balance !', "Your balance is insufficient to add bills,Please request a deposit and try again.")->persistent('Dismiss');
             ;
         }
     }
     $claim = Claim::find($id);
     $claim->claim_category = $request->claim_category;
     $claim->recurring_bill = $request->recurring_bill;
     $claim->recurring_day = $request->recurring_day;
     //$claim->expense_date = $request->expense_date;
     $claim->partial_amount = $request->partial_amount;
     $claim->reason = $request->reason;
     $claim->payment_method = $request->payment_method;
     $claim->card_number = $request->card_number;
     if ($request->claim_status == 'Approved') {
         $claim->claim_status = 'Approved';
         $claim->save();
         ////////////////Customer Ledger/////////////////
         $transaction = new Transaction();
         $transaction->user_id = $claim_user;
         $transaction->bill_id = $claim->id;
         $transaction->name = $user->name;
         $transaction->last_name = $user->last_name;
         $transaction->deduction = $request->claim_amount;
         $transaction->cbalance = $claimUser->user_balance - $request->claim_amount;
         $transaction->payment_method = $request->payment_method;
         $transaction->payment_number = $request->card_number;
         $transaction->transaction_type = "Trusted Surplus";
         $transaction->statusamount = "debit";
         $transaction->description = "{$app_name} has processed payment against bill submitted for " . $name->category_name . " category.";
         $transaction->bill_status = 'Deducted';
         $transaction->status = 1;
         $transaction->save();
         //////////////// Admin Ledger/////////////////

         $transaction = new Transaction();
         $transaction->chart_of_account = $intrustpit->id;
         $transaction->bill_id = $claim->id;
         $transaction->user_id = $claim_user;
         $transaction->name = $intrustpit->name;
         $transaction->last_name = $intrustpit->last_name;
         $transaction->deduction = $request->claim_amount;
         $transaction->payment_method = $request->payment_method;
         $transaction->payment_number = $request->card_number;
         $transaction->transaction_type = "Trusted Surplus";
         $transaction->statusamount = "debit";
         $transaction->description = "{$app_name} has processed " . $claimUser->name . " " . $claimUser->last_name . "'s payment against bill submitted for " . $name->category_name . " category.";
         $transaction->bill_status = 'Included';
         $transaction->status = 1;
         $transaction->save();
         $details = $claim;
         ////////////Updating Customer Balance/////////////
         $claimUser->user_balance = $claimUser->user_balance - $request->claim_amount;
         $claimUser->save();

         /////////////User Bill Approved Notification/////////////
         $notifcation = new Notifcation();
         $notifcation->user_id = $claimUser->id;
         $notifcation->name = $claimUser->name;
         $notifcation->bill_id = $claim->id;
         $notifcation->description = "Your Bill # " . $claim->id . " with $" . $request->claim_amount . " amount added on " . date('m/d/Y', strtotime(now())) . " has been approved successfully.";
         $notifcation->title = 'Bill Approved';
         $notifcation->status = 0;
         $notifcation->save();
         $details = $claim;
         $name = $claimUser->name . ' ' . $claimUser->last_name;

     }
     if ($request->claim_status == 'Refused') {
         $request->validate([
             'refusal_reason' => 'required'
         ], [
             'refusal_reason.required' => 'Refusal reason is required to refuse bill!'
         ]);
         $claim->claim_status = 'Refused';
         $claim->refusal_reason = $request->refusal_reason;
         $claim->save();

         /////////////User Bill Refused Notification/////////////
         $notifcation = new Notifcation();
         $notifcation->user_id = $claimUser->id;
         $notifcation->name = $claimUser->name;
         $notifcation->bill_id = $claim->id;
         $notifcation->description = "Your Bill # " . $claim->id . " with $" . $request->claim_amount . " amount added on " . date('m/d/Y', strtotime(now())) . " has been refused.";
         $notifcation->title = 'Bill Refused';
         $notifcation->status = 0;
         $notifcation->save();
         $details = $claim;
         $subject = "Bill Refused";
         $name = $claimUser->name . ' ' . $claimUser->last_name;
         $email_message = 'Your bill#' . $details->id . ' added on ' . date('m-d-Y', strtotime($details->created_at)) . ' has been refused because of the following reason:"' . $details->refusal_reason . '", Please use the button below to find the details of your bill:';
         $url = '/claims/' . $details->id;

     }
     if ($request->claim_status == "Partial") {
         $claim->claim_status = 'Partially approved';
         $claim->save();
         ////////////////Customer Ledger/////////////////
         $transaction = new Transaction();
         $transaction->user_id = $claim_user;
         $transaction->bill_id = $claim->id;
         $transaction->name = $user->name;
         $transaction->last_name = $user->last_name;
         $transaction->deduction = $claim_amount;
         $transaction->payment_method = $request->payment_method;
         $transaction->payment_number = $request->card_number;
         $transaction->transaction_type = "Trusted Surplus";
         $transaction->cbalance = $claimUser->user_balance - $claim_amount;
         $transaction->statusamount = "debit";
         $transaction->description = "{$app_name} has processed payment against bill submitted for " . $name->category_name . " category.";
         $transaction->bill_status = 'Deducted';
         $transaction->status = 1;
         $transaction->save();
         //////////////// Admin Ledger/////////////////
         $transaction = new Transaction();
         $transaction->chart_of_account = $intrustpit->id;
         $transaction->bill_id = $claim->id;
         $transaction->user_id = $claim_user;
         $transaction->name = $intrustpit->name;
         $transaction->last_name = $intrustpit->last_name;
         $transaction->payment_method = $request->payment_method;
         $transaction->payment_number = $request->card_number;
         $transaction->transaction_type = "Trusted Surplus";
         $transaction->deduction = $claim_amount;
         $transaction->statusamount = "debit";
         $transaction->description = "{$app_name} has processed " . $claimUser->name . " " . $claimUser->last_name . "'s payment against bill submitted for " . $name->category_name . " category.";
         $transaction->bill_status = 'Included';
         $transaction->status = 1;
         $transaction->save();
         ////////////Updating Customer Balance/////////////
         $claimUser->user_balance = $claimUser->user_balance - $claim_amount;
         $claimUser->save();
         /////////////User Bill Partically approved Notification/////////////
         $notifcation = new Notifcation();
         $notifcation->user_id = $claimUser->id;
         $notifcation->name = $claimUser->name;
         $notifcation->bill_id = $claim->id;
         $notifcation->description = "Your Bill # " . $claim->id . " with $" . $claim->claim_amount . " amount added on " . date('m/d/Y', strtotime(now())) . " has been partically approved with amount $" . $claim_amount . ".";
         $notifcation->title = 'Partically approved';
         $notifcation->status = 0;
         $notifcation->save();
         $details = $claim;
         $subject = "Partically approved";
         $name = $claimUser->name . ' ' . $claimUser->last_name;
         $email_message = 'Your bill#' . $details->id . ' added on ' . date('m-d-Y', strtotime($details->created_at)) . ' has been partially approved with amount $' . $claim_amount . ', Please use the button below to find the details of your bill:';
         $url = url("/claims/{$details->id}");
         if ($claimUser->notify_by == "email") {
             // SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
         }
         return response()->json(['header' => 'Partially approved!', 'type' => 'success', 'message' => "Bill#" . $request->id . " has been Partial approved successfully."]);
     }
     return response()->json(['header' => 'Bill ' . $request->claim_status . '!', 'type' => 'success', 'message' => "Bill#" . $request->id . ' has been ' . $request->claim_status . ' successfully.']);
 }
