<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Hash;
use Carbon;
use Cookie;
use Session;
use Redirect;
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
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\claimsController;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;

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

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($role != "User") {
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

            $dt = new Carbon\Carbon();
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
        } elseif ($role == "User") {
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
        $user->phone = '+1' . $request->phone;

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
        $res = $user->save();
        $id = $user->id;
        $name = $request->name;
        $user = User::find($user->id);

        if ($role && $role != "User") {
            $details = $user;
            $directory = storage_path('app/public/'.$user->email);
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            
            $pdf = PDF::loadView('document.approval-letter-pdf', ['user'=>$user]);


            $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';
            // Save the PDF file to the specified location
            $pdf->save($savePath);

            Mail::to($request->email)->send(new \App\Mail\Register($details,$savePath));
        } else {
            $details = $request->_token;
            \Mail::to($request->email)->send(new \App\Mail\registermail($details));

            $admins_notification = User::where('role', "admin")->get();

            $ignore_admin_notification = ignoreAdminEmails();

            foreach ($admins_notification as $notify) {
                ///////////////Intrustpit Notification//////////
                if (in_array($notify->email, $ignore_admin_notification))
                    continue;
                $notifcation = new Notifcation();
                $notifcation->user_id = $notify->id;
                $notifcation->name = $request->name;
                $notifcation->description = $request->name . ' ' . $request->last_name . " has registered with Intrustpit.";
                $notifcation->title = 'New User';
                $notifcation->status = 0;
                $notifcation->save();
                $subject = "New user!";
                $name = $notify->name . ' ' . $notify->last_name;
                $email_message = $request->name . ' ' . $request->last_name . " has registered with Intrustpit and waiting for approval. Please preview the profile in order to approve it:";
                $url = '/show_user/' . $user->id;
                if ($notify->notify_by == "email") {
                    SendEmailJob::dispatch($notify->email, $subject, $name, $email_message, $url);
                }
            }
        }

        $app_name = config('app.name');

        if ($res) {
            if ($role && $role != "User") {
                alert()->success('success', 'Account has been created Successfully.');
                return back()->with('success', 'Thank you.');
            } else {
                return response()->json(['header' => 'User Registered', 'message' => 'Thank you for choosing ' . $app_name . '. We are reviewing your request at the moment. You will receive an email once your account is approved or if we need more information.', 'type' => "success"]);
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

        ini_set('memory_limit', '512M');
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        if ($role == 'Vendor' || $role == 'vendor') {
            return redirect()->route('vendor.dashboard');
        } else {
            return redirect()->route('bill_reports');
        }

        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {


            $role = User::where('id', '=', Session::get('loginId'))->first();
            if ($role->role != 'User') {
                $claim_details = Claim::orderBy('id', 'desc')->take(500)->get();
                $claims = Claim::orderBy('id', 'desc')->get();
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
                $transaction = Transaction::orderBy('id', 'desc')->get();
                if ($role->role != 'User') {
                    $transaction = $transaction->where('chart_of_account', '!=', '');
                } else {
                    $transaction = $transaction->where('user_id', $role->id)->where('chart_of_account', '');
                }
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
                $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->get();
            } else if ($role == 'Moderator') {
                $claims = Claim::orderBy('id', 'desc')->get();
                $all_users = User::all();
                $claim_details = Claim::orderBy('id', 'desc')->take(500)->get();
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
            }



            //dd($claims);
            $data = compact('claims', 'transaction', 'search', 'claim_details', 'sum_processed', 'sum_claims', 'sum_claims_amount', 'sum_processed_amount', 'sum_pending', 'sum_processed_amount', 'sum_pending_amount', 'sum_approved', 'sum_approved_amount', 'sum_refused', 'sum_refused_amount', 'total_users', 'user_balance', 'all_users');


            return view('dashboard')->with($data);
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
        $search = $request['search'] ?? "";
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        $category_id = Category::where('category_name', 'LIKE', "%$search%")->first();
        $all_users = User::where('id', Session::get('loginId'))->get();
        if ($role == "User") {
            $claims = [];
            if ($category_id != null) {
                $claims = Claim::where("claim_category", $category_id->id)->where('claim_user', Session::get('loginId'))->get();
            }
        } else {
            $user = User::where('name', 'LIKE', "%$search%")->first();
            $claims = [];
            if ($user) {
                $claims = Claim::where("claim_user", $user->id)->get();
            }
        }
        $data = compact('claims', 'search', 'all_users');
        return view('claims.search')->with($data);
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

        $pool_fund = Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('credit')
            - Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('debit');

        $bill_payments = Claim::sum('claim_amount');

        $maintenance_fee = Transaction::where('user_id', \Intrustpit::Account_id)->where("type", Transaction::MaintenanceFee)->sum('credit')
            - Transaction::where('user_id', \Intrustpit::Account_id)->where("type", Transaction::MaintenanceFee)->sum('debit');

        $enrollment_fee = Transaction::where('user_id', \Intrustpit::Account_id)->where("type", Transaction::EnrollmentFee)->sum('credit')
            - Transaction::where('user_id', \Intrustpit::Account_id)->where("type", Transaction::EnrollmentFee)->sum('debit');

        $total_balance = Transaction::where('user_id', \Intrustpit::Account_id)->sum('credit')
            - Transaction::where('user_id', \Intrustpit::Account_id)->sum('debit');

        $total_accounts = User::where('role', 'Vendor')->count();
        $total_contacts = contacts::count();
        $total_leads = Lead::count();
        $total_referrals = Referral::count();

        if ($request->customer) {
            $to = $request->to;
            $from = $request->from;
            $transactions = Transaction::where('user_id', $request->customer)
                ->whereBetween(\DB::raw('DATE(created_at)'), [$from, $to])
                ->with('user')
                ->latest()
                ->take(500)
                ->get();
        } else {
            $to = "";
            $from = "";
            $transactions = Transaction::with('user')
                ->latest()
                ->take(500)
                ->get();
        }

        $pool_amount = Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('credit')
            - Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('debit');

        $pool_amount = Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('credit')
            - Transaction::where('user_id', "!=", \Intrustpit::Account_id)->sum('debit');

        $total_revenue = $maintenance_fee + $enrollment_fee;


        $start_date = null;
        $customer = "";
        $transaction = "";
        $slug = "";

        $followup = Followup::select('note', 'date')->get();

        $customers = User::where('role', 'User')
        ->leftJoin('transactions', 'users.id', '=', 'transactions.user_id')
        ->select('users.id', 'users.name', 'users.email', \DB::raw('SUM(transactions.credit) - SUM(transactions.debit) as balance'))
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderBy('users.id', 'asc')
        ->get();


        $userid = User::where('id', '=', Session::get('loginId'))->first();
        $user_balance = userBalance($userid->id);




        return view(
            "transaction",
            compact(
                'pool_fund',
                'bill_payments',
                'maintenance_fee',
                'enrollment_fee',
                'total_accounts',
                'total_contacts',
                'total_leads',
                'total_referrals',
                'total_balance',
                'pool_amount',
                'total_revenue',
                'transactions',
                'followup',
                'transaction',
                'user_balance',
                'to',
                'from',
                'slug',
                'start_date',
                'customers',
                'customer'
            )
        );

    }


    public function nav(Request $request)
    {

        //$users = User::where('id', '=', Session::get('loginId'))->value('role');
        //$data =  compact('users');
        //dd($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */


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
        if ($request->has('approval_action')) {
            $user = User::find($id);
            $user->account_status = $request->account_status;
            $user->save();
            if ($request->account_status == "Approved") {
                $status = "Approved";
                $directory = storage_path('app/public/'.$user->email);
                if (!is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }


                $pdf = PDF::loadView('document.approval-letter-pdf', ['user'=>$user]);


                $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';
                // Save the PDF file to the specified location
                $pdf->save($savePath);
                $details = [
                    'title' => 'Mail from SLC',
                    'body' => 'Your SLC account has been verified successfully.'
                ];
                Mail::to($user->email)->send(new \App\Mail\UserStatus($details, $user->name,$savePath));
            } elseif ($request->account_status == "Not Approved") {
                $status = "Not Approved";
                $details = [
                    'title' => 'Mail from Intrustpit',
                    'body' => 'Your intrustpit account has been rejected.'
                ];
                \Mail::to($user->email)->send(new \App\Mail\RejectProfile($user->name));
            } elseif ($request->account_status == "Disable") {
                $status = "Disabled";
                if ($request->approval_action != '1') {
                    $log_id = createLog('User', Session::get('loginId'), $id, "The " . $user->full_name() . "'s account has been deactivated, and their pending bills: " . $request->approval_action . " have been moved to the archives.");
                    $claim = Claim::where([
                        'claim_user' => $id,
                        'claim_status' => 'Pending'
                    ])->update(['archived' => $log_id]);
                }
                $subject = 'Account Deactivate';
                $name = $user->name . ' ' . $user->last_name;
                $email_message = 'Your profile has been deactivated by Intrustpit,For immediate assistance please call 646-854 3004.';
                $url = "";
                if ($user->notify_by == "email") {
                    SendEmailJob::dispatch($user->email, $subject, $name, $email_message, $url);
                } else {

                }
            }
            alert()->success('Account ' . $status . '!', 'Customer account has been updated successfully!');
            return redirect("show_user/" . $id);
        }
        $dt = new Carbon\Carbon();
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

        $dt = new Carbon\Carbon();
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
        $admin = User::findOrFail(\Intrustpit::Account_id);
        $uid = auth()->user();
        $app_name = config('app.name');
        $userBalance = userBalance($id);

        if ($user->account_status !== "Approved") {
            return redirect()->back()->withErrors(['insufficient' => "Please approve {$user->name}'s profile to add balance!"]);
        }

        if ($userBalance + $request->balance < $request->maintenance_fee) {
            return redirect()->back()->withErrors(['insufficient' => "{$user->name}'s balance is insufficient to charge Maintenance fee."]);
        }

        if ($request->registration_fee) {
            $deduction = ($request->balance / 100 * $request->maintenance_fee) + $request->registration_fee_amount;
            if ($deduction > $userBalance + $request->balance) {
                return redirect()->back()->withErrors(['insufficient' => "{$user->name}'s balance is insufficient to charge Enrollment fee."]);
            }
        }

        DB::beginTransaction();

        try {

            // Generate the transaction ID and descriptions
            $transactionId = $request->trans_no ?? $request->cheque_no ?? $request->card_no;
            $reference_id = generateTransactionId();
            $dateFormatted = date('m/d/Y', strtotime($request->date_of_trans));

            // Description for the deposit
            $description = "{$user->name} {$user->last_name} made \${$request->balance} deposit through {$request->payment_type} transaction id #{$transactionId} on {$dateFormatted} into {$app_name} account.";
            $customer_description = "{$app_name} added \${$request->balance} balance in your account against {$request->payment_type} transaction id #{$transactionId} on {$dateFormatted}.";

            // Record the credit transaction for the added balance
            $user->transactions()->create([
                "reference_id" => $reference_id,
                "credit" => $request->balance,
                "description" => $customer_description,
                "type" => Transaction::Deposit
            ]);

            $admin->transactions()->create([
                "reference_id" => $reference_id,
                "debit" => $request->balance,
                "description" => $description,
                "type" => Transaction::Deposit
            ]);

            // Description for the maintenance fee deduction
            $platform_fee_description = "{$app_name} \${$request->maintenance_fee} Maintenance fee deducted against \${$request->balance} balance with {$request->payment_type} transaction id #{$transactionId} on {$dateFormatted}.";

            // Deduct maintenance fee and record it as a debit
            $reference_id = generateTransactionId();
            $user->transactions()->create([
                "reference_id" => $reference_id,
                "debit" => $request->maintenance_fee,
                "description" => $platform_fee_description,
                "type" => Transaction::MaintenanceFee,
                "transaction_type" => \TransactionType::Operational
            ]);
            $admin->transactions()->create([
                "reference_id" => $reference_id,
                "credit" => $request->maintenance_fee,
                "description" => $platform_fee_description,
                "type" => Transaction::MaintenanceFee,
                "transaction_type" => \TransactionType::Operational
            ]);

            // Handle registration fee if applicable
            if ($request->registration_fee) {
                $deduction = ($request->balance / 100 * $request->maintenance_fee) + $request->registration_fee_amount;
                if ($deduction > $userBalance + $request->balance) {
                    return redirect()->back()->withErrors(['insufficient' => "{$user->name}'s balance is insufficient to charge Enrollment fee."]);
                }

                $registration_fee_description = "One-time Enrollment fee of \${$request->registration_fee_amount} deducted from {$user->name} {$user->last_name}.";
                $customer_registration_description = "One-time Enrollment fee charged from your account.";

                $reference_id = generateTransactionId();
                $user->transactions()->create([
                    "reference_id" => $reference_id,
                    "debit" => $request->registration_fee_amount,
                    "description" => $customer_registration_description,
                    "type" => Transaction::EnrollmentFee,
                    "transaction_type" => \TransactionType::Operational
                ]);
                $admin->transactions()->create([
                    "reference_id" => $reference_id,
                    "credit" => $request->registration_fee_amount,
                    "description" => $registration_fee_description,
                    "type" => Transaction::EnrollmentFee,
                    "transaction_type" => \TransactionType::Operational
                ]);
            }
            /////////////User Add Balance Notification/////////////
            $notifcation = Notifcation::create([
                "user_id" => $user->id,
                "name" => $user->name . " " . $user->last_name,
                "description" => "Your intrustpit account has been topped up successfully with amount $" . $request->balance . ".",
                "title" => 'Balance Added',
                "status" => 0
            ]);

            $details = User::find($user->id);
            $subject = "Balance Added";
            $name = $user->name . ' ' . $user->last_name;
            $email_message = "Your intrustpit account has been topped up successfully with amount $" . $request->balance . ". Now you can add bills using your Intrustpit account! Please use the button below to add bills:";

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

