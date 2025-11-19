<?php

namespace App\Http\Controllers;

use App\Imports\ApprovePendingBills;
use App\Imports\CustomerDepositImport;
use App\Imports\UsersImport;
use App\Jobs\SendBillJob;
use App\Models\Category;
use App\Models\Claim;
use App\Models\Notifcation;
use App\Models\PayeeModel;
use App\Models\Transaction;
use App\Models\User;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class claimsController extends Controller
{
    public function index(Request $request)
    {
        ini_set('memory_limit', '512M');

        $search = $request['search'] ?? "";

        if ($search != "") {

            $claims = Claim::with('payee_details')->orderBy('id', 'desc')->get();
            $all_users = User::all();
            $total_users = DB::table('users')->count('id');
            $user_balance = DB::table('users')->sum('user_balance');
            $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
            $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
            $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
            $sum_refused = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'refused')->count('id');
            $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
            $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
            $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
            $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
            $sum_claims = DB::table('claims')->count('id');
            $sum_claims_amount = DB::table('claims')->sum('claim_amount');
            $claim_details = Claim::where('claim_user', $request->search)->where('archived', null)->get();
            $transaction = Transaction::orderBy('id', 'desc')->get();
            $transaction = $transaction->where('chart_of_account', '!=', '');
            $data = compact('claims', 'search', 'claim_details', 'sum_processed', 'sum_claims', 'sum_claims_amount', 'sum_processed_amount', 'sum_pending', 'sum_processed_amount', 'sum_pending_amount', 'sum_approved', 'sum_approved_amount', 'sum_refused', 'sum_refused_amount', 'total_users', 'user_balance', 'all_users', 'transaction');
            return view('dashboard')->with($data);

        } else {

            $role = User::where('id', '=', Session::get('loginId'))->value('role');

            if ($role != 'User') {

                $claims = Claim::with(['payee_details', 'user_details', 'transaction_details'])->orderBy('id', 'desc')->get();
                $claim_details = Claim::with(['payee_details', 'user_details'])->orderBy('id', 'desc')->where('archived', null)->get();
                $all_users = User::all();
                $total_users = DB::table('users')->count('id');
                $user_balance = DB::table('users')->sum('user_balance');
                $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
                $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
                $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
                $sum_refused = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'refused')->count('id');
                $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
                $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
                $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
                $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
                $sum_claims = DB::table('claims')->count('id');
                $sum_claims_amount = DB::table('claims')->sum('claim_amount');

            } else if ($role == 'User') {

                $all_users = User::all();
                $total_users = DB::table('users')->count('id');
                $user_balance = DB::table('users')->sum('user_balance');
                $sum_processed = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'processed')->count('id');
                $sum_pending = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'pending')->count('id');
                $sum_approved = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'approved')->count('id');
                $sum_refused = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'refused')->count('id');
                $sum_processed_amount = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'processed')->sum('claim_amount');
                $sum_approved_amount = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'approved')->sum('claim_amount');
                $sum_refused_amount = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'refused')->sum('claim_amount');
                $sum_pending_amount = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'pending')->sum('claim_amount');
                $sum_claims = DB::table('claims')->where('claim_user', Session::get('loginId'))->count('id');
                $sum_claims_amount = DB::table('claims')->where('claim_user', Session::get('loginId'))->sum('claim_amount');
                $claims = Claim::with('transaction_details')->orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->where('archived', null)->get();
                $claim_details = '';

            } else if ($role == 'Moderator') {

                $claims = Claim::with(['payee_details', 'user_details', 'transaction_details'])->orderBy('id', 'desc')->where('archived', null)->get();
                $all_users = User::all();
                $total_users = DB::table('users')->count('id');
                $user_balance = DB::table('users')->sum('user_balance');
                $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
                $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
                $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
                $sum_refused = DB::table('claims')->where('claim_user', Session::get('loginId'))->where('claim_status', 'refused')->count('id');
                $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
                $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
                $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
                $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
                $sum_claims = DB::table('claims')->count('id');
                $sum_claims_amount = DB::table('claims')->sum('claim_amount');

                $claim_details = '';
            }

            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction = Transaction::orderBy('id', 'desc')->get();
            if ($userid->role != 'User') {
                $transaction = $transaction->where('chart_of_account', '!=', '');
            } else {
                $transaction = $transaction->where('user_id', $userid->id)->where('chart_of_account', '');
            }

            return view('dashboard', compact('claims', 'search', 'claim_details', 'sum_processed', 'sum_claims', 'sum_claims_amount', 'sum_processed_amount', 'sum_pending', 'sum_processed_amount', 'sum_pending_amount', 'sum_approved', 'sum_approved_amount', 'sum_refused', 'sum_refused_amount', 'total_users', 'user_balance', 'all_users', 'transaction'));
        }

    }

    public function deletedbills(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {

            $role = User::where('id', '=', Session::get('loginId'))->value('role');

            if ($role != 'User') {

                $claims = Claim::orderBy('id', 'desc')->onlyTrashed()->get();
                $all_users = User::all();

            } else if ($role == 'User') {

                $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->paginate(15);
                $all_users = User::all();

            }

            $data = compact('claims', 'search', 'all_users');
            return view('claims.deletedclaims', $data);
        }

    }

    public function create(Request $request)
    {
        $users = User::orderBy('name')->get();
        $categories = Category::all();
        $search = $request['search'] ?? "";
        if ($search != "") {
            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search', 'users');
            return view('claims.search')->with($data);

        } else {
            $payees = PayeeModel::get();
            $claims = Claim::orderBy('id', 'desc')->paginate(10);
            $data = compact('claims', 'search', 'users', 'categories', 'payees');
            return view('claims.add_claim', $data);

        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'claim_user' => 'required',
            'claim_category' => 'required',
            'claim_amount' => 'required|numeric',
            'claim_bill_attachment' => 'nullable|mimes:jpg,jpeg,png,gif,pdf|max:6048',
            'recurring_day' => 'required_if:recurring_bill,1',
            'payee_name' => 'required',
            'submission_date' => 'required',
        ], [
            'claim_bill_attachment.error' => 'Bill attachment must be an image or pdf',
            'claim_user.required' => 'Customer is required',
            'recurring_day.required_if' => 'Please select billing cycle',
        ]);

        $user = User::find(Session::get('loginId'));
        $claimUser = User::find($validated['claim_user'] ?? $user->id);
        $admin = User::find(\Company::Account_id);
        $app_name = config('app.professional_name');

        if ($claimUser->account_status == 'Disable') {
            return response()->json(['type' => 'warning', 'header' => 'User Disabled!', 'message' => "You cannot add bill against disabled customer."]);
        }

        $balance = userBalance($claimUser->id);

        $balanceStr = number_format((float) $balance, 2, '.', '');
        $claimAmountStr = number_format((float) $validated['claim_amount'], 2, '.', '');
        if (
            $user->role != "User" &&
            bccomp($balanceStr, $claimAmountStr, 2) < 0 &&
            $request->claim_status == 'Approved'
            ) {
                return response()->json([
                    'type' => 'warning',
                    'header' => 'Insufficient balance!',
                    'message' => "{$claimUser->name}'s balance is insufficient to approve this bill. Please add balance first."
                ]);
            }
            // dd($balanceStr , $claimAmountStr);


        DB::beginTransaction();

        try {

            $category = Category::find($request->claim_category);

            if ($request->claim_bill_attachment) {
                $attachment = rand() . $request->file('claim_bill_attachment')->getClientOriginalName();
                $request->file('claim_bill_attachment')->move(public_path('/img'), $attachment);
            } else {
                $attachment = null;
            }

            $claim = new Claim([
                'claim_user' => $claimUser->id,
                'claim_category' => $validated['claim_category'],
                'claim_amount' => $validated['claim_amount'],
                'claim_description' => $request->claim_description,
                'expense_date' => $request->expense_date,
                'payee_name' => $request->payee_name,
                'account_number' => $request->account_number,
                'bill_number' => $request->bill_number,
                'claim_bill_attachment' => $attachment,
                'recurring_bill' => $request->has('recurring_bill') ? 1 : 0,
                'recurring_day' => $request->recurring_day,
                'submission_date' => $request->submission_date,
            ]);

            if ($request->claim_status == 'Approved' && $balance >= $request->claim_amount) {

                $claim->claim_status = 'Approved';
                $claim->save();
                $details = $claim;

                $reference_id = generateTransactionId();

                ////////////////Customer Ledger/////////////////

                $claimUser->transactions()->create([
                    'status' => 1,
                    'bill_id' => $claim->id,
                    "reference_id" => $reference_id,
                    'debit' => $request->claim_amount,
                    'payment_method' => $request->payment_method,
                    'payment_number' => $request->card_number,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                    'description' => "{$app_name} has processed payment against bill submitted for " . $category->category_name . " category.",
                ]);

                ////////////////Admin Ledger/////////////////

                $admin->transactions()->create([
                    "status" => 1,
                    "bill_id" => $claim->id,
                    "reference_id" => $reference_id,
                    "credit" => $request->claim_amount,
                    "payment_method" => $request->payment_method,
                    "payment_number" => $request->payment_number,
                    "transaction_type" => \TransactionType::TrustedSurplus,
                    "description" => "{$app_name} has processed {$claimUser->name} {$claimUser->last_name}'s payment against bill submitted for {$category->category_name} category.",
                ]);

                /////////////User Bill Notification/////////////
                Notifcation::create([
                    'user_id' => $claimUser->id,
                    'name' => $claimUser->name,
                    'bill_id' => $claim->id,
                    'description' => "Your Bill # " . $claim->id . " with $" . $request->claim_amount . " amount has been added on " . date('m/d/Y', strtotime(now())) . " by {$app_name}.",
                    'title' => 'Bill Approved',
                    'status' => 0,
                ]);

                $name = "{$claimUser->name} {$claimUser->last_name}";
                $email_message = "Your bill#" . $details->id . " added on " . date('m-d-Y', strtotime($details->created_at)) . " has been approved. Please use the button below to find the details of your bill:";
                $url = url("/claims/$details->id");

                if($category->category_name != "Melody")
                {
                    SendBillJob::dispatch($claimUser, $url, $email_message, 'bill_approved');
                }

            } else {

                $claim->claim_status = 'Pending';
                $claim->save();
                $details = $claim;
                $name = "{$claimUser->name} {$claimUser->last_name}";
                $email_message = "Your bill#" . $details->id . " has been added on " . date('m-d-Y', strtotime($claim->created_at)) . ". Please use the button below to find the details of your bill:";
                $url = "/claims/$details->id";

                $bill_message = "We are pleased to inform you that Bill #{$details->id} has been successfully added to your Senior Life Care account on " . date('m-d-Y', strtotime($claim->created_at)) . ". To view the details of your bill, please click the button below:";

                if($category->category_name != "Melody")
                {
                    SendBillJob::dispatch($claimUser, $url, $bill_message, "bill_submitted");
                }

                $admins_notification = User::where('role', '!=', "User")->get();
                $ignore_admin_notification = ignoreAdminEmails();

                foreach ($admins_notification as $notify) {

                    if (in_array($notify->email, $ignore_admin_notification)) {
                        continue;
                    }

                    Notifcation::create([
                        'status' => 0,
                        'title' => 'Bill Added',
                        'bill_id' => $claim->id,
                        'user_id' => $notify->id,
                        'name' => $claimUser->name,
                        'description' => "Bill # {$claim->id} with \${$request->claim_amount} amount has been added by {$claimUser->name} on " . date('m/d/Y', strtotime(now())) . ".",
                    ]);

                    $details = $claim;
                    $name = "{$notify->name} {$notify->last_name}";
                    $email_message = "{$claimUser->name} {$claimUser->last_name} has submitted bill#{$details->id} on " . date('m-d-Y', strtotime($claim->created_at)) . " and waiting for approval. Please use the button below to find the details of the bill:";

                    $url = url("/claims/{$details->id}");

                }
            }

            if ($request->claim_status != 'Approved') {

                Notifcation::create([
                    'status' => 0,
                    'title' => 'Bill Added',
                    'name' => $claimUser->name,
                    'bill_id' => $claim->id,
                    'user_id' => $claimUser->id,
                    'description' => "Your Bill # " . $claim->id . " with $" . $request->claim_amount . " amount has been added on " . date('m/d/Y', strtotime(now())) . ".",
                ]);

            }

            DB::commit();
            $balanceStr = number_format((float) $balance, 2, '.', '');
            $claimAmountStr = number_format((float) $request->claim_amount, 2, '.', '');

            if (bccomp($balanceStr, $claimAmountStr, 2) < 0) {
                return response()->json([
                    'header' => 'Insufficient balance!',
                    'type' => 'success',
                    'message' => "Your bill has been submitted successfully."
                ]);
            } else {
                return response()->json([
                    'header' => 'Bill Submitted!',
                    'type' => 'success',
                    'message' => "Your bill has been submitted successfully."
                ]);
            }

        } catch (\Exception $e) {

            DB::rollBack();
            errorLogs($e->getMessage());
            return response()->json(['header' => 'Error !', 'type' => 'error', 'message' => " Something went wrong"]);

        }

    }

    public function show(Request $request, $id)
    {
        $role = User::where('id', '=', Session::get('loginId'))->first();

        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $categories = Category::all();
            $data = compact('claims', 'search', 'categories');
            return view('claims.search')->with($data);

        } else {

            $users = User::all();
            $claim = Claim::find($id);
            if ($role->role != "User") {
                $notification = Notifcation::where('bill_id', $id)->where('user_id', 7)->get();
                foreach ($notification as $data) {
                    $status = Notifcation::find($data->id);
                    $status->status = '0';
                    $status->save();
                }
            } else {
                $notification = Notifcation::where('bill_id', $id)->where('user_id', $role->id)->get();
                foreach ($notification as $data) {
                    $status = Notifcation::find($data->id);
                    $status->status = '0';
                    $status->save();
                }
            }

            $categories = Category::all();
            if ($claim) {
                $data = compact('claim', 'search', 'categories', 'users');
                return view('claims.view')->with($data);
            } else {
                alert()->error('Claim  ', 'Your claim not found! ');
                return back();
            }

        }
    }

    public function edit(Request $request, $id)
    {

        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $categories = Category::all();
            $data = compact('claims', 'search', 'categories');
            return view('claims.search')->with($data);

        } else {
            $users = User::all();
            $claim = Claim::find($id);
            $categories = Category::all();
            $data = compact('claim', 'search', 'categories', 'users');
            return view('claims.edit')->with($data);

        }
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $validated = $request->validate([
            'claim_status' => 'required',
            'recurring_day' => 'required_if:recurring_bill,1',
            'payment_method' => 'required_if:claim_status,Approved,Partial',
            'card_number' => 'required_if:claim_status,Approved,Partial',
            'partial_amount' => 'nullable|required_if:claim_status,Partial|numeric|min:1',
            'reason' => 'required_if:claim_status,Partial',
            'refusal_reason' => 'required_if:claim_status,Refused',
        ], [
            'claim_bill_attachment.error' => 'Bill attachment must be an image or pdf',
            'claim_user.required' => 'Customer is required',
            'recurring_day.required_if' => 'Please select billing cycle',
            'payment_method.required_if' => 'Payment method is required for approved or partial claims',
            'card_number.required_if' => 'Payment number is required for approved or partial claims',
            'partial_amount.required_if' => 'Partial amount is required when status is Partial',
            'partial_amount.numeric' => 'Partial amount must be a number.',
            'partial_amount.min' => 'Partial amount must be at least 1.',
            'reason.required_if' => 'Reason is required when status is Partial',
            'refusal_reason.required_if' => 'Refusal reason is required to refuse bill',
        ]);

        $admin = User::findOrFail(\Company::Account_id);
        $claim = Claim::findOrFail($request->id);
        $claimUser = User::findOrFail($claim->claim_user);
        $category = Category::findOrFail($request->claim_category);
        $app_name = config('app.professional_name');

        if ($claimUser->account_status == 'Disable') {
            return response()->json(['type' => 'warning', 'header' => 'User Disabled!', 'message' => "You cannot update bill for disabled customer."]);
        }

        $balance = userBalance($claimUser->id);
        $amountToUpdate = $request->claim_status == 'Partial' ? $validated['partial_amount'] : $claim->claim_amount;
        $balanceStr = number_format((float) $balance, 2, '.', '');
        $amountStr = number_format((float) $amountToUpdate, 2, '.', '');

        // Accurate float comparison using bccomp
        if (bccomp($balanceStr, $amountStr, 2) < 0 && $request->claim_status != 'Refused') {
            return response()->json([
                'type' => 'warning',
                'header' => 'Insufficient balance!',
                'message' => "{$claimUser->name}'s balance is insufficient to update this bill.",
            ]);
        }

        $claim = Claim::find($id);

        DB::beginTransaction();

        try {

            $claim->update([
                'recurring_bill' => $request->recurring_bill ?? $claim->recurring_bill,
                'recurring_day' => $request->recurring_day ?? $claim->recurring_day,
                'claim_status' => $validated['claim_status'],
                'partial_amount' => $validated['partial_amount'] ?? null,
                'reason' => $validated['reason'] ?? null,
                'refusal_reason' => $validated['refusal_reason'] ?? null,
                'payment_method' => $validated['payment_method'] ?? null,
                'card_number' => $validated['card_number'] ?? null,
                'claim_category' => $request->claim_category,
            ]);

            if ($request->claim_status == 'Approved') {

                $claim->update(['claim_status' => 'Approved']);

                ////////////////Customer Ledger/////////////////

                $reference_id = generateTransactionId();

                $claimUser->transactions()->create([
                    "status" => 1,
                    "bill_id" => $claim->id,
                    "reference_id" => $reference_id,
                    "debit" => $request->claim_amount,
                    "payment_number" => $request->card_number,
                    "payment_method" => $request->payment_method,
                    "transaction_type" => \TransactionType::TrustedSurplus,
                    "description" => "{$app_name} has processed payment against bill submitted for {$category->category_name} category.",
                ]);

                ////////////////Admin Ledger/////////////////

                $admin->transactions()->create([
                    "status" => 1,
                    "bill_id" => $claim->id,
                    "reference_id" => $reference_id,
                    "credit" => $request->claim_amount,
                    "payment_number" => $request->card_number,
                    "payment_method" => $request->payment_method,
                    "transaction_type" => \TransactionType::TrustedSurplus,
                    "description" => "{$app_name} has processed {$claimUser->name} {$claimUser->last_name}'s payment against bill submitted for {$category->category_name} category.",
                ]);

                /////////////User Bill Approved Notification/////////////

                Notifcation::create([
                    'status' => 0,
                    'bill_id' => $claim->id,
                    'name' => $claimUser->name,
                    'user_id' => $claimUser->id,
                    'description' => "Your Bill # " . $claim->id . " with $" . $request->claim_amount . " amount added on " . date('m/d/Y', strtotime(now())) . " has been approved successfully.",
                    'title' => 'Bill Approved',
                ]);

                $name = "$claimUser->name  $claimUser->last_name";
                $url = "/claims/$claim->id";

                $bill_message = "We are pleased to inform you that Bill #{$claim->id}, submitted on " . date('m-d-Y', strtotime($claim->created_at)) . ", has been approved. To view the details of your bill, please click the button below:";

                if($category->category_name != "Melody")
                {
                    SendBillJob::dispatch($claimUser, $url, $bill_message, "bill_approved");
                }

            }
            if ($request->claim_status == 'Refused') {

                $claim->update([
                    'claim_status' => 'Refused',
                    'refusal_reason' => $request->refusal_reason,
                ]);

                /////////////User Bill Refused Notification/////////////

                $bill_message = "Your Bill # {$claim->id} with \${$request->claim_amount} amount added on " . date('m/d/Y', strtotime(now())) . " has been refused. Reason: " . $request->refusal_reason;

                Notifcation::create([
                    'status' => 0,
                    'bill_id' => $claim->id,
                    'title' => 'Bill Refused',
                    'name' => $claimUser->name,
                    'user_id' => $claimUser->id,
                    'description' => $bill_message,
                ]);

                $url = "/claims/$claim->id";

                if($category->category_name != "Melody")
                {
                    SendBillJob::dispatch($claimUser, $url, $bill_message, "bill_rejected");
                }


            }
            if ($request->claim_status == "Partial") {

                $claim->update(['claim_status' => 'Partially approved']);
                $reference_id = generateTransactionId();

                ////////////////Customer Ledger/////////////////

                $claimUser->transactions()->create([
                    'status' => 1,
                    'bill_id' => $claim->id,
                    'reference_id' => $reference_id,
                    'debit' => $request->partial_amount,
                    'payment_number' => $request->card_number,
                    'payment_method' => $request->payment_method,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                    'description' => "{$app_name} has processed payment against bill submitted for " . $category->category_name . " category.",
                ]);

                ////////////////Admin Ledger/////////////////

                $admin->transactions()->create([
                    'status' => 1,
                    'bill_id' => $claim->id,
                    'reference_id' => $reference_id,
                    'credit' => $request->partial_amount,
                    'payment_number' => $request->card_number,
                    'payment_method' => $request->payment_method,
                    'transaction_type' => \TransactionType::TrustedSurplus,
                    'description' => "{$app_name} has processed " . $claimUser->name . " " . $claimUser->last_name . "'s payment against bill submitted for " . $category->category_name . " category.",
                ]);

                /////////////User Bill Partically approved Notification/////////////

                Notifcation::create([
                    'status' => 0,
                    'bill_id' => $claim->id,
                    'name' => $claimUser->name,
                    'user_id' => $claimUser->id,
                    'title' => 'Partically approved',
                    'description' => "Your Bill # " . $claim->id . " with $" . $claim->claim_amount . " amount added on " . date('m/d/Y', strtotime(now())) . " has been partically approved with amount $" . $request->partial_amount . ".",
                ]);

                $name = "{$claimUser->name} {$claimUser->last_name}";

                $url = "/claims/$claim->id";

                $bill_message = "We would like to inform you that Bill #{$claim->id}, submitted on " . date('m-d-Y', strtotime($claim->created_at)) . ", has been partially approved. To view the details of your bill, please click the button below:";

                if($category->category_name != "Melody")
                {
                    SendBillJob::dispatch($claimUser, $url, $bill_message, "bill_partially_approved");
                }

                DB::commit();

                return response()->json(['header' => 'Partially approved!', 'type' => 'success', 'message' => "Bill#{$request->id} has been Partial approved successfully."]);
            }

            DB::commit();
            return response()->json(['header' => "Bill {$request->claim_status}!", 'type' => 'success', 'message' => "Bill#{$request->id} has been {$request->claim_status} successfully."]);

        } catch (\Exception $e) {
            DB::rollback();
            errorLogs($e->getMessage());
            return response()->json(['header' => 'Error!', 'type' => 'error', 'message' => 'Something went wrong']);
        }
    }

    public function destroy(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->delete();
        return response()->json('success');
    }

    public function trace_recurring(Request $request)
    {

        $page = $request->query('page', 1);
        $perPage = 1;
        $claims = Claim::orderBy('created_at', 'desc')
            ->where('recurred', '!=', '0')
            ->get()
            ->groupBy(function ($claim) {
                return $claim->created_at->format('m-d-Y');
            });
        // Create a paginator manually using Laravel's LengthAwarePaginator
        $currentPageItems = $claims->slice(($page - 1) * $perPage, $perPage);
        $claimsPaginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $claims->count(),
            $perPage,
            $page,
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ]
        );
        return view('claims.trace_recurring', compact('claimsPaginated'));
    }
    public function duplicate_bill(Request $request)
    {
        $this->validate(
            $request,
            [
                'date' => 'required',
            ],
            [
                'date.required' => 'Please select date first.',
            ]
        );
        $requestedMonth = date('Y-m', strtotime($request->input('date')));
        $check = Claim::where('recurred', $request->id)
            ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$requestedMonth])
            ->whereNull('deleted_at')
            ->first();
        if (!$check) {
            $claim = Claim::find($request->id);
            $new_claim = $claim->replicate();
            $new_claim->claim_status = 'Pending';
            $new_claim->partial_amount = null;
            $new_claim->recurring_bill = 0;
            $new_claim->recurred = $claim->id;
            $new_claim->recurring_day = null;
            $new_claim->created_at = date('Y-m-d H:i:s', strtotime($request->input('date') . ' ' . now()->format('H:i:s')));
            $new_claim->save();
            return response()->json(['success' => true, 'message' => 'Bill#' . $request->id . ' has been duplicated successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Bill#' . $request->id . ' has already been duplicated on ' . $check->created_at->format('m-d-Y') . ' with bill Id#' . $check->id . '!']);
        }
    }
    public function RestoreBill(Request $request)
    {
        $bill = Claim::withTrashed()->findOrFail($request->id);
        $bill->restore();
        return response()->json('success');
    }
    public function RecurringBills(Request $request)
    {
        $claims = Claim::where('claim_status', '!=', 'Refused')->where('recurring_bill', '1')->get();
        return view('claims.recurring', compact('claims'));
    }

    public function RemoveFromRecurring(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->recurring_bill = '0';
        $claim->save();
        return response()->json(['success' => 'bill # ' . $request->id . ' has been removed successfully from recurring']);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new UsersImport, request()->file('import_file'));
            alert()->success('Profiles created', 'User Profiles has been imported successfully');
            return back();
        } catch (\Exception $e) {
            alert()->error('Invalid Format', 'Import unsuccessful');
            return back();
        }
    }
    public function customerdeposit(Request $request)
    {
        // try {
        // Excel::import(new CustomerDepositImport,request()->file('import_file'));
        Excel::import(new CustomerDepositImport, request()->file('import_file'));
        //     alert()->success('Balance added', 'Deposit has been imported successfully');
        //     return back();
        // }catch (\Exception $e){
        //     alert()->error('Invalid Format', 'Import unsuccessful');
        //     return back();
        // }
        return response()->json(['success' => 'Deposited successfully']);

    }
    public function preview_file()
    {
        return view('claims.preview_file_data');
    }
    public function update_bills_status(Request $request)
    {
        try {
            Excel::import(new ApprovePendingBills, request()->file('import_file'));
            alert()->success('Bills Approved', 'Bills have Been approved successfully');
            return back();
        } catch (\Exception $e) {
            alert()->error('Invalid Format', 'Import unsuccessful');
            return back();
        }
    }
    public function edit_bill($id)
    {
        $claim = claim::findOrFail($id);
        // if($claim->claim_status!='Pending'){
        //     alert()->warning('warning !','Only pending bills will be edited');
        //     return back();
        // }
        $users = User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        $payees = PayeeModel::get();
        $data = compact('claim', 'categories', 'users', 'payees');
        return view('claims.edit_bill')->with($data);
    }

    public function edit_recurring_bill($id)
    {
        $users = User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        $payees = PayeeModel::get();
        $data = compact('claim', 'categories', 'users', 'payees');
        return view('claims.edit_recurring_bills')->with($data);
    }
    public function store_edited_recurring_bill(Request $request)
    {
        $this->validate(
            $request,
            [
                'recurring_day' => 'required',
            ],
            [
                'recurring_day.required' => 'Please select billing cycle',
            ]
        );
        $claim = Claim::find($request->id);
        $claim->recurring_day = $request->recurring_day;
        $claim_amount = $claim->claim_amount != $request->claim_amount ? "Amount has been changed from " . $claim->claim_amount . " to " . $request->claim_amount . ". " : "";
        $payeeModelOld = PayeeModel::find($claim->payee_name);
        $payeeModelNew = PayeeModel::find($request->payee_name);
        $payee_name = ($claim->payee_name != $request->payee_name && $payeeModelOld && $payeeModelNew)
        ? "Payee name has been changed from " . $payeeModelOld->name
        . " to " . $payeeModelNew->name . ". "
        : "";
        // $payee_name = $claim->payee_name != $request->payee_name ? "Payee name has been changed from ".PayeeModel::find($claim->payee_name)->name." to ".PayeeModel::find($request->payee_name)->name.". " : "";
        $account_number = $claim->account_number != $request->account_number ? "Account number has been changed from " . $claim->account_number . " to " . $request->account_number . ". " : "";
        $submission_date = $claim->created_at->format("Y-m-d") != $request->created_at ? "Submission date has been changed from " . $claim->created_at->format("m/d/Y") . " to " . date('m/d/Y', strtotime($request->created_at)) . "." : "";
        $description = $claim->user_details->name . ' ' . $claim->user_details->last_name . "'s Bill#" . $claim->id . " has been updated with the following changing, " . $claim_amount . $payee_name . $account_number . $submission_date;
        $claim->claim_amount = $request->claim_amount;
        $claim->payee_name = $request->payee_name;
        $claim->account_number = $request->account_number;
        $claim->created_at->format("Y-m-d") != $request->created_at ? $claim->created_at = $request->created_at : "";
        $claim->created_at = $request->created_at;
        $claim->save();
        $claim_amount == "" && $payee_name == "" && $account_number == "" && $submission_date == "" ? "" : createLog('Bill', Session::get('loginId'), $claim->claim_user, $description);
        return response()->json(['type' => 'success', 'message' => 'Recurring Bill has been updated successfully', 'header' => 'success']);
    }
    public function store_edit_bill(Request $request)
    {
        $this->validate($request, [
            'claim_amount' => 'required|numeric',
            'claim_category' => 'required',
            'claim_bill_attachment' => 'mimes:jpg,jpeg,png,gif,pdf|max:6048',
            'recurring_day' => 'required_if:recurring_bill,1',
            'submission_date' => 'required',
        ], [
            'recurring_day.required_if' => 'Please select billing cycle',
        ]);

        $claim = claim::findOrFail($request->id);

        $claim->recurring_day = $request->recurring_day;
        $claim->claim_amount = $request->claim_amount;
        $claim->claim_category = $request->claim_category;
        $claim->recurring_bill = $request->recurring_bill;
        $claim->payee_name = $request->payee_name;
        $claim->account_number = $request->account_number;
        $claim->submission_date = $request->submission_date;

        if ($request->claim_description) {
            $claim->claim_description = $request->claim_description;
        }

        if ($request->claim_bill_attachment) {
            $attachment = rand() . $request->claim_bill_attachment->getClientOriginalName();
            $request->claim_bill_attachment->move(public_path('/img'), $attachment);
            $claim->claim_bill_attachment = $attachment;
        }
        $claim->save();
        return response()->json(['header' => 'Bill Edited !', 'type' => 'success', 'message' => " Your bill has been edited successfully."]);
    }

}
