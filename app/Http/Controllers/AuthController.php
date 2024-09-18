<?php

namespace App\Http\Controllers;

use Hash;
use Cookie;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Models\City;
use App\Models\Lead;
use App\Models\User;
use App\Models\Claim;
use App\Models\Category;
use App\Models\contacts;
use App\Models\Followup;
use App\Models\Referral;
use App\Jobs\sendEmailJob;
use App\Models\Notifcation;
use App\Models\Transaction;
use App\Jobs\CashDepositJob;
use Illuminate\Http\Request;
use App\Mail\CashDepositMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function deposit_preview()
    {
        return view("previews.deposit");
    }

    public function registerUser(Request $request)
    {
        $request->role = ucfirst(trans($request->role));

        $app_name = config('app.name');

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($role && $role != "User") {
            if ($request->role == 'User') {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                    'billing_method' => 'required',
                ]);
            }
            if ($request->role != 'User') {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required|email|unique:users',
                ]);
            }

        } else {

            $dt = new Carbon();
            $before = $dt->subYears(16)->format('Y-m-d');
            $request->validate([
                'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,pdf',
                'name' => 'required',
                'terms' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'last_name' => 'required',
                'full_ssn' => 'required',
                'DOB' => 'required|date|before:' . $before,
                'address' => 'required',
                'state' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'marital_status' => 'required',
                'gender' => 'required',
                'billing_method' => 'required',
                'phone' => 'required',
                'docs.*' => 'required|mimes:jpg,png,pdf',
            ], [
                'profile_pic.required' => 'Photo ID is required',
                'profile_pic.mimes' => 'Photo ID must be a type of jpeg,png or pdf',
                'name.required' => 'First name field is required',
                'terms.required' => 'Please accept privacy policy and terms of service',
                'email.required' => 'Email field is required',
                'password.required' => 'Password field is required',
                'last_name.required' => 'Last name field is required',
                'full_ssn.required' => 'SSN field is required',
                'state.required' => 'State field is required',
                'address.required' => 'Address field is required',
                'city.required' => 'City field is required',
                'zipcode.required' => 'Zipcode field is required',
                'marital_status.required' => 'Marital status field is required',
                'gender.required' => 'Gender field is required',
                'billing_method.required' => 'Billing method field is required',
                'phone.required' => 'Phone field is required',
                'DOB.required' => "Date of birth field is required",
                'DOB.before' => "Age should be greater than 16 years",
            ]);
        }

        $user = new User();

        if ($role != "User") {
            $user->role = ucfirst(trans($request->role));
            $user->billing_method = 'manual';
            $user->account_status = $request->account_status;
            $user->assignRole(strtolower($request->role));
        }
        if (!$role && $request->role == "User") {
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
            $user->assignRole('user');
            $user->role = "User";
        }

        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->full_ssn = $request->full_ssn;
        $user->dob = $request->DOB;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->phone = "+1{$request->phone}";

        if ($request->role == 'User') {
            $user->billing_method = $request->billing_method;
            $user->account_status = User::Pending;
        }

        if ($role and $role != "User") {
            $user->account_status = User::Approved;
        }

        $user->billing_cycle = $request->billing_cycle;
        $user->zipcode = $request->zipcode;
        $user->marital_status = $request->marital_status;
        $user->gender = $request->gender;
        $user->date_of_withdrawal = $request->date_of_withdrawal;
        $user->email = $request->email;
        $user->user_balance = '0';
        $user->token = $request->_token . rand();
        $user->password = Hash::make($request->password);
        $user->last_renewal_at = Carbon::now();
        $user->next_renewal_at = Carbon::now()->addYear();
        $res = $user->save();
        $id = $user->id;
        $name = $request->name;
        $user = User::find($user->id);

        if ($role && $role != "User") {
//            set_time_limit(13000);
            $details = $user;

            $directory = storage_path('app/public/' . $user->email);
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user]);


            $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';
            // Save the PDF file to the specified location
            $pdf->save($savePath);

            Mail::to($request->email)->send(new \App\Mail\Register($details, $savePath));

        } else {
            $details = $request->_token;
            Mail::to($request->email)->send(new \App\Mail\registermail($details));

            $admins_notification = User::where('role', "admin")->get();

            $ignore_admin_notification = ignoreAdminEmails();

            foreach ($admins_notification as $notify) {
                /////////////// Admin Notification//////////
                if (in_array($notify->email, $ignore_admin_notification))
                    continue;
                $notifcation = new Notifcation();
                $notifcation->user_id = $notify->id;
                $notifcation->name = $request->name;
                $notifcation->description = $request->name . ' ' . $request->last_name . " has registered with {$app_name}.";
                $notifcation->title = 'New User';
                $notifcation->status = 0;
                $notifcation->save();
                $subject = "New user!";
                $name = "{$notify->name} {$notify->last_name}";
                $email_message = $request->name . ' ' . $request->last_name . " has registered with {$app_name} and waiting for approval. Please preview the profile in order to approve it:";
                $url = "/show_user/$user->id";
                if ($notify->notify_by == "email") {
                    SendEmailJob::dispatch($notify->email, $subject, $name, $email_message, $url);
                }
            }
        }

        if ($res) {
            if ($role && $role != "User") {
                alert()->success('success', 'Account has been created Successfully.');
                return back()->with('success', 'Thank you.');
            } else {
                return response()->json(['header' => 'User Registered', 'message' => 'Thank you for choosing ' . $app_name . '. We are reviewing your request at the moment. You will receive an email once your account is approved or if we need more information. For immediate assistance, please call '.config('app.contact'), 'type' => "success"]);
            }
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if ($user->billing_method == 'manual') {
                if (Hash::check($request->password, $user->password)) {

                    if ($request->rememberme) {
                        cookie::queue('adminemail', $request->email, 1440);
                        cookie::queue('adminpassword', $request->password, 1440);

                    }
                    $request->Session()->put('loginId', $user->id);
                    return redirect('dashboard');
                } else {
                    return back()->with('fail', 'Wrong password, forget your password?');
                }

            } else {
                if (Hash::check($request->password, $user->password)) {
                    if ($request->rememberme) {
                        cookie::queue('adminemail', $request->email, 1440);
                        cookie::queue('adminpassword', $request->password, 1440);
                    }
                    $request->Session()->put('loginId', $user->id);
                    return redirect('dashboard');
                } else {
                    return back()->with('fail', 'Wrong password, forget your password?');
                }
            }
        } else {
            return back()->with('fail', 'Seems like you are not registered.');
        }
    }

    public function dashboard(Request $request)
    {

        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role == 'Vendor' || $role == 'vendor') {
            return redirect()->route('vendor.dashboard');
        } else {
            return redirect()->route('bill_reports');
        }

    }

    public function search_claim(Request $request)
    {
        return redirect('claims');
        $search = $request['search'] ?? "";
        if ($search != "") {
            $all_users = User::all();
            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search', 'all_users');
            return view('claims.search')->with($data);

        } else {
            $all_users = User::all();
            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $user = User::orderBy('id')->paginate(10);
            $data = compact('claims', 'search', 'user', 'all_users');
            return view('claims.search')->with($data);
        }
    }

    public function search_user_claim(Request $request)
    {
        $search = $request->input('search', '');
        $loginId = Session::get('loginId');

        $role = User::where('id', $loginId)->pluck('role')->first();

        $claims = collect();

        if ($role === 'User') {

            $category_id = Category::where('category_name', 'LIKE', "%$search%")->pluck('id')->first();

            if ($category_id) {
                $claims = Claim::with(['payee_details', 'category_details'])->where('claim_category', $category_id)
                    ->where('claim_user', $loginId)
                    ->get();
            }

        } else {

            $user = User::where('name', 'LIKE', "%$search%")->first();

            if ($user) {
                $claims = $user->calims()->with(['payee_details', 'category_details'])->get();
            }

        }

        return view('claims.search', compact('claims', 'search'));
    }



    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/');
        }
    }

    public function all_users(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {
            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $user = User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'vendor');
            })->orderBy('id', 'desc')->get();
            $data = compact('claims', 'search', 'user');
            return view('all_users')->with($data);
        }
    }

    public function add_user(Request $request)
    {

        $search = $searchrequest['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {

            $claims = Claim::orderBy('id', 'desc')->paginate(10);
            $roles = Role::all();
            $data = compact('claims', 'search', 'roles');
            return view("add_user")->with($data);

        }
    }

    public function profile_setting()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        return view("profileSetting", compact('user'));
    }

    public function read_all_notificaion(Request $request)
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        if ($request->key == 0) {
            if ($user->role == 'User') {
                Notifcation::where('user_id', $user->id)->delete();
            } else {
                Notifcation::where('user_id', $user->id)->delete();
            }

        } else {
            if ($user->role == 'user') {
                Notifcation::where('id', $request->key)->delete();
            } else {
                Notifcation::where('id', $request->key)->delete();
            }
        }
        return response()->json(['success', 'Read successfully!']);
    }

    public function notifications()
    {
        $user = User::where('id', '=', Session::get('loginId'))->first();
        if ($user->role != 'User') {
            $notifcation = Notifcation::orderBy('id', 'desc')->where('user_id', $user->id)->get();
            foreach ($notifcation as $read) {
                $read = Notifcation::find($read->id);
                $read->status = '1';
                $read->save();
            }
        } else {
            $notifcation = Notifcation::orderBy('id', 'desc')->where('user_id', $user->id)->get();
            foreach ($notifcation as $read) {
                $read = Notifcation::find($read->id);
                $read->status = '1';
                $read->save();
            }
        }
        return view("notifcation", compact('notifcation'));
    }

    public function bill_reports(Request $request)
    {
        // Calculate pool fund, bill payments, total accounts, contacts, leads, and referrals
        $pool_fund = Transaction::where('user_id', "!=", \Company::Account_id)->sum('credit')
            - Transaction::where('user_id', "!=", \Company::Account_id)->sum('debit');

        $bill_payments = Claim::sum('claim_amount');
        $total_accounts = User::where('role', 'Vendor')->count();
        $total_contacts = Contacts::count();
        $total_leads = Lead::count();
        $total_referrals = Referral::count();
        $customer = 'all';

        $loggedInUser = User::where('id', '=', Session::get('loginId'))->first();

        if ($request->customer && $request->to && $request->from) {

            $to = $request->to;
            $from = $request->from;
            $customer = $request->customer;

            $transactions = Transaction::when($customer != 'all', function ($query) use ($customer) {
                $query->where('user_id', $customer);
            })
                ->whereBetween('created_at', [Carbon::parse($from)->startOfDay(), Carbon::parse($to)->endOfDay()])
                ->with('user')
                ->latest('reference_id')
                ->take(500)
                ->get();

            $pool_amount = userBalance($request->customer);

            $maintenance_fee = Transaction::where('user_id', \Company::Account_id)
                ->where('user_id', $request->customer)
                ->where("type", Transaction::MaintenanceFee)->sum('debit');

            $enrollment_fee = Transaction::where('user_id', \Company::Account_id)
                ->where('user_id', $request->customer)
                ->where("type", Transaction::EnrollmentFee)->sum('debit');

        } else {

            $to = "";
            $from = "";

            $transactions = Transaction::with('user')
                ->when($loggedInUser->role == 'User', function ($query) use ($loggedInUser) {
                    $query->where('user_id', $loggedInUser->id);
                })
                ->latest('reference_id')
                ->take(500)
                ->get();

            $maintenance_fee = Transaction::where('user_id', \Company::Account_id)
                ->where("type", Transaction::MaintenanceFee)->sum('credit')
                - Transaction::where('user_id', \Company::Account_id)
                    ->where("type", Transaction::MaintenanceFee)->sum('debit');

            $enrollment_fee = Transaction::where('user_id', \Company::Account_id)
                ->where("type", Transaction::EnrollmentFee)->sum('credit')
                - Transaction::where('user_id', \Company::Account_id)
                    ->where("type", Transaction::EnrollmentFee)->sum('debit');

            $pool_amount = Transaction::where('user_id', "!=", \Company::Account_id)->sum('credit')
                - Transaction::where('user_id', "!=", \Company::Account_id)->sum('debit');
        }

        $total_revenue = $maintenance_fee + $enrollment_fee;

        $start_date = null;
        $followup = Followup::select('note', 'date')->get();

        $customers = User::where('role', 'User')
            ->leftJoin('transactions', 'users.id', '=', 'transactions.user_id')
            ->select('users.id', 'users.name', 'users.email', \DB::raw('SUM(transactions.credit) - SUM(transactions.debit) as balance'))
            ->groupBy('users.id', 'users.name', 'users.email')
            ->orderBy('users.id', 'asc')
            ->get();

        $user_balance = userBalance($loggedInUser->id);

        return view(
            "transaction",
            compact(
                'pool_fund',
                'bill_payments',
                'maintenance_fee',
                'total_referrals',
                'enrollment_fee',
                'total_accounts',
                'total_contacts',
                'total_revenue',
                'transactions',
                'total_leads',
                'pool_amount',
                'user_balance',
                'start_date',
                'customers',
                'followup',
                'customer',
                'from',
                'to',
            )
        );
    }


    public function view_user(Request $request, $id)
    {

        $user = User::find($id);

        $data = compact('user');

        return view("add_balance")->with($data);

    }

    public function show_user(Request $request, $id)
    {

        $user = User::find($id);
        $data = compact('user');

        return view("edit_user")->with($data);

    }

    public function edit_user_details(Request $request, $id)
    {
        $user = User::find($id);
        $data = compact('user');

        return view("edit_user_details")->with($data);
    }
    public function user_bills(Request $request)
    {
        $pending_bills = Claim::where([
            'claim_user' => $request->id,
            'claim_status' => 'Pending',
            'archived' => null
        ])->pluck('id')->map(function ($id) {
            return " Bill#$id";
        })
            ->toArray();
        return response()->json($pending_bills);
    }
    public function update_existing_user(Request $request, $id)
    {
        $app_name = config('app.name');
        if ($request->has('approval_action')) {
            $user = User::find($id);
            $user->account_status = $request->account_status;
            $user->save();
            if ($request->account_status == "Approved") {
                $status = "Approved";
                $directory = storage_path('app/public/' . $user->email);
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }


                $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user]);


                $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';
                // Save the PDF file to the specified location
                $pdf->save($savePath);
                $details = [

                    'title' => 'Mail from ' . $app_name,
                    'body' => 'Your ' . $app_name . ' account has been verified successfully.'
                ];
                Mail::to($user->email)->send(new \App\Mail\UserStatus($details, $user->name, $savePath));

            } elseif ($request->account_status == "Not Approved") {
                $status = "Not Approved";
                $details = [
                    'title' => 'Mail from ' . $app_name,
                    'body' => 'Your ' . $app_name . ' account has been rejected.'
                ];
                Mail::to($user->email)->send(new \App\Mail\RejectProfile($user->name));
            } elseif ($request->account_status == "Disable") {
                $status = "Disabled";
                if ($request->approval_action != '1') {
                    $log_id = createLog('User', Session::get('loginId'), $id, "The " . $user->full_name() . "'s account has been deactivated, and their pending bills: " . $request->approval_action . " have been moved to the archives.");
                    Claim::where([
                        'claim_user' => $id,
                        'claim_status' => 'Pending'
                    ])->update(['archived' => $log_id]);
                }
                $subject = 'Account Deactivate';
                $name = "{$user->name}  {$user->last_name}";
                $email_message = "Your profile has been deactivated by {$app_name},For immediate assistance please call ".config('app.contact');
                $url = "";
                if ($user->notify_by == "email") {
                    SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                } else {

                }
            }
            alert()->success('Account ' . $status . '!', 'Customer account has been updated successfully!');
            return redirect("show_user/" . $id);
        }
        $dt = new Carbon();
        $before = $dt->subYears(16)->format('Y-m-d');
        $this->validate($request, [
            'dob' => 'date|before:' . $before,
        ], [
            'dob.required' => "Date of birth field is required",
            'dob.before' => "Age should be greater than 16 years",
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->full_ssn = $request->full_ssn;
        $user->dob = $request->dob;
        $user->address = $request->address;
        if ($request->state != null) {
            $user->state = $request->state;
        }
        if ($request->city != null) {
            $user->city = $request->city;
        }
        if ($request->notify_before != null) {
            $user->notify_before = $request->notify_before;
        }
        $user->zipcode = $request->zipcode;
        //$user->notify_by = $request->notify_by;
        $user->marital_status = $request->marital_status;
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role == "User") {
            $user->account_status = $user->account_status;
        }
        if ($request->hasfile('profile_pic')) {
            $this->validate($request, [
                'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            ], [
                'profile_pic.required' => 'Photo Id is required',
                'profile_pic.mimes' => 'Photo Id must be an image or pdf'
            ]);
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
        }

        $user->phone = $request->phone;
        $user->gender = $user->gender;
        $user->date_of_withdrawal = $user->date_of_withdrawal;
        $user->email = $user->email;
        $res = $user->save();
        alert()->success('Profile updated!', 'Profile has been updated successfully!');
        return redirect("profile_setting");
    }

    public function update_existing_user_profile(Request $request, $id)
    {

        $dt = new Carbon();
        $before = $dt->subYears(16)->format('Y-m-d');
        $request->validate([
            'fname' => 'required',
            'last_name' => 'required',
            'profile_pic' => 'mimes:jpeg,png,jpg,gif,pdf',
            'email' => 'required|email',
            // 'dob' => 'date|before:'.$before,
        ], [
            'profile_pic.required' => 'Photo ID is required',
            'profile_pic.mimes' => 'Photo ID must be a type of jpeg,png or pdf',
            'email.required' => 'Email field is required',
            'dob.before' => "Age should be greater than 16 years",
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->fname;
        $user->last_name = $request->last_name;
        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'unique:users'
            ]);
            $user->email = $request->email;
        }
        $user->full_ssn = $request->full_ssn;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->notify_before = $request->notify_before;
        $user->zipcode = $request->zipcode;
        // $user->notify_by = $request->notify_by;
        $user->marital_status = $request->marital_status;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasfile('profile_pic')) {
            $this->validate($request, [
                'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            ], [
                'profile_pic.required' => 'Photo Id is required',
                'profile_pic.mimes' => 'Photo Id must be an image or pdf'
            ]);
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
        }
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        // $user->date_of_withdrawal = $request->date_of_withdrawal;
        $user->email = $request->email;
        $res = $user->save();
        alert()->success('Profile updated!', 'Profile has been updated successfully!');
        return Redirect::back();
    }

    public function add_user_balance(Request $request, $id)
    {
        $this->validate($request, [
            'payment_type' => 'required|string',
            'balance' => 'required|numeric',
            'date_of_trans' => 'required|date',
            'trans_no' => 'nullable|string',
            'cheque_no' => 'nullable|string',
            'card_no' => 'nullable|string',
            'maintenance_fee' => 'nullable|numeric',
            'registration_fee' => 'nullable|numeric',
            'registration_fee_amount' => 'nullable|numeric',
        ], [
            'date_of_trans.required' => 'Transaction date field is required',
        ]);

        $user = User::findOrFail($id);
        $admin = User::findOrFail(\Company::Account_id);
        $app_name = config('app.name');

        $maintenance_fee_amount = $request->balance * ($request->maintenance_fee / 100);

        $userBalance = userBalance($id);

        if ($user->account_status !== "Approved") {
            return redirect()->back()->withErrors(['insufficient' => "Please approve {$user->name}'s profile to add balance!"]);
        }

        if ($userBalance + $request->balance < $maintenance_fee_amount) {
            return redirect()->back()->withErrors(['insufficient' => "{$user->name}'s balance is insufficient to charge Maintenance fee."]);
        }

        if ($request->registration_fee) {
            $deduction = $maintenance_fee_amount + $request->registration_fee_amount;
            if ($deduction > $userBalance + $request->balance) {
                return redirect()->back()->withErrors(['insufficient' => "{$user->name}'s balance is insufficient to charge Enrollment fee."]);
            }
        }

        DB::beginTransaction();

        try {

            // Generate the transaction ID and descriptions
            $transactionId = $request->trans_no ?? $request->cheque_no ?? $request->card_no;
            $reference_id = generateTransactionId();

            // Description for the deposit
            $description = "Deposit of \${$request->balance} made via {$request->payment_type} on {$request->date_of_trans} Transaction ID: #{$transactionId}.";
            $customer_description = "\${$request->balance} added in account on {$request->date_of_trans} against {$request->payment_type} Transaction ID: #{$transactionId}.";

            // Record the credit transaction for the added balance
            $admin->transactions()->create([
                "debit" => $request->balance,
                "description" => $description,
                "type" => Transaction::Deposit,
                "reference_id" => $reference_id,
            ]);

            $transaction = $user->transactions()->create([
                "reference_id" => $reference_id,
                "credit" => $request->balance,
                "description" => $customer_description,
                "type" => Transaction::Deposit
            ]);

            $directory = storage_path('app/public/'.$user->id);
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }


            $pdf = PDF::loadView('document.trusted-surplus-pdf', ["user" => $user, "transaction" => $transaction]);

            $pdfLink = $directory . '/trusted_' . date('Ymd_His') . '.pdf';

            $pdf->save($pdfLink);

            Mail::to($user->email)->send(new CashDepositMail($pdfLink));

            $platform_fee_description = "Maintenance fee of \${$maintenance_fee_amount} has been charged.";
            $customer_platform_fee_description = "Maintenance fee of \${$maintenance_fee_amount} deducted.";

            // Deduct maintenance fee and record it as a debit
            $reference_id = generateTransactionId();

            $user->transactions()->create([
                "reference_id" => $reference_id,
                "debit" => $maintenance_fee_amount,
                "type" => Transaction::MaintenanceFee,
                "description" => $customer_platform_fee_description,
                "transaction_type" => \TransactionType::Operational
            ]);

            $admin->transactions()->create([
                "reference_id" => $reference_id,
                "credit" => $maintenance_fee_amount,
                "type" => Transaction::MaintenanceFee,
                "description" => $platform_fee_description,
                "transaction_type" => \TransactionType::Operational
            ]);

            // Handle registration fee if applicable
            if ($request->registration_fee) {

                $registration_fee_description = "A one-time enrollment fee of \${$request->registration_fee_amount} has been charged.";
                $customer_registration_description = "A one-time Enrollment fee of \${$request->registration_fee_amount} deducted.";

                $reference_id = generateTransactionId();

                $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::EnrollmentFee,
                    "debit" => $request->registration_fee_amount,
                    "description" => $customer_registration_description,
                    "transaction_type" => \TransactionType::Operational
                ]);

                $admin->transactions()->create([
                    "reference_id" => $reference_id,
                    "type" => Transaction::EnrollmentFee,
                    "credit" => $request->registration_fee_amount,
                    "description" => $registration_fee_description,
                    "transaction_type" => \TransactionType::Operational
                ]);
            }

            /////////////User Add Balance Notification/////////////
            Notifcation::create([
                "status" => 0,
                "user_id" => $user->id,
                "title" => 'Balance Added',
                "name" => "{$user->name} {$user->last_name}",
                "description" => "Your {$app_name} account has been topped up successfully with amount \${$request->balance}",
            ]);

            alert()->success('Balance Added', 'User balance has been added');

            DB::commit();

            return redirect("all_users");

        } catch (\Exception $e) {
            DB::rollback();
            errorLogs($e->getMessage());
            return redirect()->back()->withErrors(['insufficient' => "Something went wrong"]);

        }
    }

    public function state_fetch_city($state)
    {
        $cities = City::where('state', $state)->get();
        return response()->json($cities);
    }

    public function prePaidDashboard()
    {
        return view('prePaidDashboard');
    }

    public function search_claim_data(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $all_users = User::all();
            $user = User::where('id', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%.")->orwhere('last_name', 'LIKE', "%$search%")->orwhere('role', 'LIKE', "%$search%")->orwhere('account_status', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('address', 'LIKE', "%$search%")->orwhere('zipcode', 'LIKE', "%$search%")->get();
            $data = compact('user', 'search', 'all_users');
            return view('usersearch')->with($data);

        } else {
            $all_users = User::all();
            $user = User::where('id', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%.")->orwhere('last_name', 'LIKE', "%$search%")->orwhere('role', 'LIKE', "%$search%")->orwhere('account_status', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('address', 'LIKE', "%$search%")->orwhere('zipcode', 'LIKE', "%$search%")->get();
            $user = User::orderBy('id')->paginate(10);
            $data = compact('user', 'search', 'user', 'all_users');
            return view('usersearch')->with($data);
        }
    }

    public function search_transaction_data(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $all_users = User::all();
            $transaction = Transaction::where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();

            return view('transactionsearch', compact('transaction'));

        } else {
            $all_users = User::all();
            $transaction = Transaction::where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();
            $user = User::orderBy('id')->paginate(10);
            return view('transactionsearch', compact('transaction'));
        }
    }

    public function search_transaction_user_data(Request $request)
    {
        $search = $request['search'] ?? "";
        $id = User::where('id', '=', Session::get('loginId'))->value('id');
        if ($search != "") {
            $all_users = User::all();
            $transaction = Transaction::where("user_id", $id)->where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();

            return view('transactionsearch', compact('transaction'));

        } else {
            $all_users = User::all();
            $transaction = Transaction::where("user_id", $id)->where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();
            $user = User::orderBy('id')->paginate(10);
            return view('transactionsearch', compact('transaction'));
        }
    }

    public function vendor_dashboard(Request $request)
    {
        $vendor = User::where('id', Session::get('loginId'))
            ->first();

        $referralsOfVendor = $vendor->referrals;

        $contacts = $vendor->contacts;
        $referralsOfContacts = $contacts->flatMap(function ($contact) {
            return $contact->referrals;
        });
        $referrals = $referralsOfVendor->merge($referralsOfContacts)->sortByDesc('id');

        return view('vendors.vendor_dashboard', compact('vendor', 'referrals'));
    }


}

