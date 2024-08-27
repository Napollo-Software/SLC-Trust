<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Referral;
use Facade\Ignition\SolutionProviders\DefaultDbNameSolutionProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Claim;
use App\Models\Notifcation;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\claimsController;
use Hash;
use Cookie;
use Redirect;
use Session;
use App\Models\City;
use Carbon;
use App\Jobs\sendEmailJob;
use App\Models\Category;
use App\Models\Followup;
use Spatie\Permission\Models\Role;

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
                // 'billing_cycle'=>'required',
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


        $path = 'user/images';
        $fontpath = public_path('fonts/oliciy.ttf');
        $char = strtoupper($request->name[0]);
        $newAvatarname = rand(12, 34355) . time() . '_avatar.png';
        $dest = $path . $newAvatarname;

        $createAvatar = makeAvatar($fontpath, $dest, $char);
        $avatar = $createAvatar == true ? $newAvatarname : '';
        $user = new user();
        if ($role != "User") {
            $user->role = ucfirst(trans($request->role));
            $user->billing_method = 'manual';
            $user->account_status = $request->account_status;
            $user->assignRole(strtolower($request->role));
        }
        if ($role == "User") {
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
        }
        $user->billing_cycle = $request->billing_cycle;
        $user->zipcode = $request->zipcode;
        $user->marital_status = $request->marital_status;
        $user->gender = $request->gender;
        $user->date_of_withdrawal = $request->date_of_withdrawal;
        $user->email = $request->email;
        $user->avatar = $avatar;
        $user->user_balance = '0';
        $user->token = $request->_token . rand();
        $user->password = Hash::make($request->password);
        $res = $user->save();
        $id = $user->id;
        $name = $request->name;
        $user = User::find($user->id);
        if ($role != "User") {
            $details = $user;
            \Mail::to($request->email)->send(new \App\Mail\Register($details));
        } else {
            $details = $request->_token;
            \Mail::to($request->email)->send(new \App\Mail\registermail($details));
            $admins_notification = User::where('role', "admin")->get();
            $ignore_admin_notification = [
                'devops@napollo.net',
                'svaldivia@trustedsurplus.org',
                'ldurzieh@trustedsurplus.org',
                'rbauman@trustedsurplus.org'
            ];
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
                } else {

                }
            }
        }
        if ($res) {
            if ($role != "User") {
                alert()->success('success', 'Account has been created Successfully.');
                return back()->with('success', 'Thank you.');
            } else {
                return response()->json(['header' => 'User Registered', 'message' => 'Thank you for choosing intrustpit. We are reviewing your request at the moment. You will receive an email once your account is approved or if we need more information. For immediate assistance please call  718-970-7878 .', 'type' => "success"]);
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
        } else{
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
        $start_date = null;
        $customer = "";
        if ($request->has('plateform_income')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            if ($userid->role != 'User') {
                $transaction = Transaction::where('transaction_against_category', null)->where('description', 'LIKE', '%Maintenance fee%')->where('chart_of_account', '!=', '')->where('statusamount', 'CREDIT')->orderBy('id', 'desc')->get();
            } else {
                $transaction = Transaction::where('description', 'LIKE', '%Maintenance fee%')->where('user_id', $id)->where('chart_of_account', '')->orderBy('id', 'desc')->get();
            }
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'plateform_income';
            $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('
            ', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee %')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
        } elseif ($request->has('registration_fee')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            if ($userid->role != 'User') {
                $transaction = Transaction::where('transaction_against_category', null)->where('description', 'LIKE', '%Enrollment fee%')->where('chart_of_account', '!=', '')->where('statusamount', 'CREDIT')->orderBy('id', 'desc')->get();
            } else {
                $transaction = Transaction::where('description', 'LIKE', '%Enrollment fee%')->where('chart_of_account', '')->where('user_id', $id)->orderBy('id', 'desc')->get();

            }
            //dd($transaction);
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'registration_fee';
            $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee %')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
        } elseif ($request->has('paid_amount')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            if ($userid->role != 'User') {
                $transaction = Transaction::where('transaction_against_category', null)->where('description', 'LIKE', '%Bill Payment%')->where('chart_of_account', '!=', '')->orderBy('id', 'desc')->get();
            } else {
                $transaction = Transaction::where('description', 'LIKE', '%Bill Paid%')->where('chart_of_account', '')->where('user_id', $id)->orderBy('id', 'desc')->get();

            }
            //dd($transaction);
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'paid_amount';
            $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee %')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
        } elseif ($request->has('over_all_revenew')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction = Transaction::where('description', 'LIKE', '%Maintenance fee%')->orWhere('description', 'LIKE', '%Enrollment fee%')->orderBy('id', 'desc')->get();
            if ($userid->role == 'Admin' || $userid->role == 'Moderator') {
                $transaction = $transaction->where('transaction_against_category', null)->where('statusamount', 'credit')->where('chart_of_account', '!=', '');
            } else {
                $transaction = $transaction->where('user_id', $id)->where('chart_of_account', '');
            }
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'over_all_revenew';
            $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee%')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
        } elseif ($request->has('bill_refund')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction = Transaction::where('description', 'LIKE', '%Bill Refund%')->where('statusamount', 'CREDIT')->orderBy('id', 'desc')->get();
            if ($userid->role == 'Admin' || $userid->role == 'Moderator') {
                $transaction = $transaction->where('transaction_against_category', null)->where('chart_of_account', '!=', '');
            } else {
                $transaction = $transaction->where('user_id', $id)->where('chart_of_account', '');
            }
            //dd($transaction);
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'bill_refund';
            $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee%')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
        } elseif ($request->has('submit')) {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction = Transaction::whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->orderBy('id', 'desc')->get();
            if ($userid->role != 'User') {
                $transaction = $transaction->where('transaction_against_category', null)->where('chart_of_account', '!=', '');
                if($request->customer != 'all') {
                    $transaction = $transaction->where('user_id',$request->customer);
                }
            } else {
                $transaction = $transaction->where('user_id', $id)->where('chart_of_account', '');
            }
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = $request->to;
            $from = $request->from;
            $customer = $request->customer;
            $slug = 'filtered_transactions';
            $platform_income = Transaction::where('transaction_against_category', null)->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
            $registration_free = Transaction::where('transaction_against_category', null)->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Enrollment fee%')->get();
            $bill_paid = Transaction::where('transaction_against_category', null)->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
            $bill_refund = Transaction::where('transaction_against_category', null)->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();

        } else {
            $id = User::where('id', '=', Session::get('loginId'))->value('id');
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction = Transaction::orderBy('id', 'asc')->get();
            if ($userid->role != 'User') {
                $transaction = $transaction->where('transaction_against_category', '')->where('chart_of_account', '!=', '')->sortByDesc('id')->take('500');
            } else {
                $transaction = $transaction->where('user_id', $id)->where('chart_of_account', '');
            }
            $amount = User::find(7);
            $adminamount = $userid->user_balance;
            $to = date('y-m-d');
            $from = date('y-m-d');
            $slug = 'all_transactions';
            if ($userid->role != 'User') {
                $platform_income = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Maintenance fee%')->get();
                $registration_free = Transaction::where('transaction_against_category', null)->where('description', 'LIKE', '%Enrollment fee%')->get();
                $bill_paid = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Payment%')->get();
                $bill_refund = Transaction::where('transaction_against_category', null)->where('chart_of_account', '!=', '')->where('description', 'LIKE', '%Bill Refund%')->get();
            } else {
                $platform_income = Transaction::where('chart_of_account', null)->where('user_id', $id)->where('description', 'LIKE', '%Maintenance fee%')->get();
                $registration_free = Transaction::where('chart_of_account', null)->where('user_id', $id)->where('description', 'LIKE', '%Enrollment fee%')->get();
                $bill_paid = Transaction::where('chart_of_account', null)->where('user_id', $id)->where('description', 'LIKE', '%payment against your bill%')->get();
                $bill_refund = Transaction::where('chart_of_account', null)->where('user_id', $id)->where('description', 'LIKE', '%Bill Refund%')->get();
            }
            //  dd($platform_income);
        }
        $followup = Followup::select('note', 'date')->get();
        $customers = User::where('role','User')->orderBy('name','asc')->get();
        return view("transaction", compact('platform_income', 'followup', 'registration_free', 'bill_paid', 'bill_refund', 'transaction', 'adminamount', 'to', 'from', 'slug', 'start_date','customers','customer'));

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
    public function user_bills(Request $request){
        $pending_bills = Claim::where([
            'claim_user' => $request->id,
            'claim_status' => 'Pending',
            'archived' => null
        ])->pluck('id')->map(fn($id) => ' Bill#'.$id)
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
                $details = [
                    'title' => 'Mail from Intrustpit',
                    'body' => 'Your intrustpit account has been verified successfully.'
                ];
                \Mail::to($user->email)->send(new \App\Mail\UserStatus($details, $user->name));
            } elseif ($request->account_status == "Not Approved") {
                $status = "Not Approved";
                $details = [
                    'title' => 'Mail from Intrustpit',
                    'body' => 'Your intrustpit account has been rejected.'
                ];
                \Mail::to($user->email)->send(new \App\Mail\RejectProfile($user->name));
            } elseif ($request->account_status == "Disable") {
                $status = "Disabled";
                if($request->approval_action != '1'){
                    $log_id = createLog('User',Session::get('loginId'), $id , "The ".$user->full_name()."'s account has been deactivated, and their pending bills: ".$request->approval_action." have been moved to the archives.");
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
        $this->validate(
            $request,
            [
                'payment_type' => 'required',
                'balance' => 'required',
                'date_of_trans' => 'required'
            ],
            [
                'date_of_trans.required' => 'Transaction date field is required',
            ]
        );
        $admin = User::find(7);
        $user = User::find($id);
        $description = "";
        if ($request->trans_no != "") {
            $description = $user->name . " " . $user->last_name . " made $" . $request->balance . " deposit through " . $request->payment_type . " transaction id #" . $request->trans_no . " on " . date('m/d/Y', strtotime($request->date_of_trans)) . " into intrustpit account.";
            $customer_description = "Intrustpit added $" . $request->balance . " balance in your account against " . $request->payment_type . " transaction id #" . $request->trans_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            if ($request->balance != 0) {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted against $" . $request->balance . " balance with " . $request->payment_type . " transaction id #" . $request->trans_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            } else {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted with " . $request->payment_type . " transaction id #" . $request->trans_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            }

        }
        if ($request->cheque_no != "") {
            $description = $user->name . " " . $user->last_name . " made $" . $request->balance . " deposit through cheque #" . $request->cheque_no . " on " . date('m/d/Y', strtotime($request->date_of_trans)) . " into intrustpit account.";
            $customer_description = "Intrustpit added $" . $request->balance . " balance in your account against cheque #" . $request->cheque_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            if ($request->balance != 0) {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted against $" . $request->balance . " balance with cheque #" . $request->cheque_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            } else {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted with cheque #" . $request->cheque_no . " on " . date('m/d/Y', strtotime($request->date_of_trans)) . ".";
            }

        }
        if ($request->card_no != "") {
            $description = $user->name . " " . $user->last_name . " made $" . $request->balance . " deposit through card #" . $request->card_no . " on " . date('m/d/Y', strtotime($request->date_of_trans)) . " into intrustpit account.";
            $customer_description = "Intrustpit added $" . $request->balance . " balance in your account against card #" . $request->card_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            if ($request->balance != 0) {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted against $" . $request->balance . " balance with card #" . $request->card_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            } else {
                $plateform_fee_description = "Intrustpit $" . $request->maintenance_fee . " Maintenance fee deducted with card #" . $request->card_no . " on " . date('m/d/Y', strtotime($request->date_of_trans));
            }

        }
        $bill_date = date('m-d-Y', strtotime($user->created_at));
        $role = User::where('id', '=', Session::get('loginId'))->value('role');
        $uid = User::where('id', '=', Session::get('loginId'))->first();
        $amount = $request->maintenance_fee;
        $accoutbalance = $request->balance / 100 * $amount;

        $registration_fee = $request->registration_fee;
        if ($user->account_status != "Approved") {
            return Redirect::back()->withErrors(['insufficient' => 'Please approve ' . $user->name . "'s profile in order to add balance!"]);
        }
        if ($user->user_balance + $request->balance < $request->maintenance_fee) {
            return Redirect::back()->withErrors(['insufficient' => $user->name . "'s balance is insufficient to charge Maintenance fee."]);
        } else {
            $user->user_balance = $user->user_balance - $request->maintenance_fee;
            $processed = 1;
        }
        if ($request->registration_fee) {
            $deduction = ($request->balance / 100 * $request->maintenance_fee) + $request->registration_fee_amount;
            if ($deduction > $user->user_balance + $request->balance) {
                return Redirect::back()->withErrors(['insufficient' => $user->name . "'s balance is insufficient to  charge Enrollment fee."]);
            }
            $newbalance = $request->balance * ((100 - $amount) / 100);
            $cbalance = $user->user_balance + $newbalance + ($request->balance / 100 * $request->registration_fee_amount);

        } else {
            $deduction = ($request->balance / 100 * $request->maintenance_fee);
            $newbalance = $request->balance * ((100 - $amount) / 100) + $user->user_balance;
            $cbalance = $newbalance + ($request->balance / 100 * $request->maintenance_fee);
        }
        /////////////////////Updating User Balance )* ((100-$amount) / 100////////////////
        if ($request->registration_fee) {
            $user->user_balance = $request->balance + $user->user_balance;
        } else {
            $user->user_balance = $request->balance + $user->user_balance;
        }
        $res = $user->save();
        //////////////////////Intrustpit Ledger///////////////////
        if ($request->balance != 0) {

            $transaction4 = new Transaction();
            if ($role != "User") {
                $transaction4->user_id = $user->id;
            } elseif ($role == "User") {
                $transaction4->user_id = $user->id;
            }
            $transaction4->chart_of_account = $admin->id;
            $transaction4->admin_user_name = $uid->name;
            $transaction4->admin_last_name = $uid->last_name;
            $transaction4->deduction = $request->balance;
            $transaction4->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction4->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction4->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction4->payment_number = $request->card_no;
            }
            $transaction4->transaction_type = "Trusted Surplus";
            $transaction4->cbalance = $cbalance;
            $transaction4->name = $user->name;
            $transaction4->statusamount = "credit";
            $transaction4->last_name = $user->last_name;
            $transaction4->description = $description;
            $transaction4->bill_status = "Added";
            $transaction4->status = 1;
            $transaction4->save();
        }
        // dd($transaction4);
        if ($request->maintenance_fee != 0) {
            $transaction5 = new Transaction();
            if ($role != "User") {
                $transaction5->user_id = $user->id;
            } elseif ($role == "User") {
                $transaction5->user_id = $user->id;
            }
            $transaction5->chart_of_account = $admin->id;
            $transaction5->admin_user_name = $uid->name;
            $transaction5->admin_last_name = $uid->last_name;
            $transaction5->deduction = $request->maintenance_fee;
            $transaction5->cbalance = $newbalance;
            $transaction5->name = $user->name;
            $transaction5->statusamount = "credit";
            $transaction5->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction5->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction5->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction5->payment_number = $request->card_no;
            }
            $transaction5->transaction_type = "Operational";
            $transaction5->last_name = $user->last_name;
            $transaction5->description = $plateform_fee_description . " from " . $user->name . " " . $user->last_name . "'s account.";
            $transaction5->bill_status = "Deducted";
            $transaction5->status = $processed;
            $transaction5->sum_of_credit = 1;
            $transaction5->save();
        }
        ///////////////////////Customer Ledger///////////////////
        if ($request->balance != 0) {

            $transaction4 = new Transaction();
            if ($role != "User") {
                $transaction4->user_id = $user->id;
            } elseif ($role == "User") {
                $transaction4->user_id = $user->id;
            }
            $transaction4->admin_user_name = $uid->name;
            $transaction4->admin_last_name = $uid->last_name;
            $transaction4->deduction = $request->balance;
            $transaction4->cbalance = $user->user_balance;
            $transaction4->name = $user->name;
            $transaction4->statusamount = "credit";
            $transaction4->last_name = $user->last_name;
            $transaction4->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction4->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction4->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction4->payment_number = $request->card_no;
            }
            $transaction4->transaction_type = "Trusted Surplus";
            $transaction4->description = $customer_description;
            $transaction4->bill_status = "Added";
            $transaction4->status = 1;
            $transaction4->save();

        }
        if ($request->maintenance_fee != 0) {
            $transaction4 = new Transaction();
            if ($role != "User") {
                $transaction4->user_id = $user->id;
            } elseif ($role == "User") {
                $transaction4->user_id = $user->id;
            }
            $transaction4->admin_user_name = $uid->name;
            $transaction4->admin_last_name = $uid->last_name;
            $transaction4->deduction = $request->maintenance_fee;
            $transaction4->cbalance = $user->user_balance - $request->maintenance_fee;
            $transaction4->name = $user->name;
            $transaction4->statusamount = "debit";
            $transaction4->last_name = $user->last_name;
            $transaction4->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction4->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction4->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction4->payment_number = $request->card_no;
            }
            $transaction4->transaction_type = "Operational";
            $transaction4->description = $plateform_fee_description;
            $transaction4->bill_status = "Deducted";
            $transaction4->status = $processed;
            $transaction4->save();
        }
        if ($request->registration_fee) {
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->chart_of_account = $admin->id;
            $transaction->admin_user_name = $uid->name;
            $transaction->admin_last_name = $uid->last_name;
            $transaction->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction->payment_number = $request->card_no;
            }
            $transaction->transaction_type = "Operational";
            $transaction->deduction = $request->registration_fee_amount;
            $transaction->cbalance = $admin->user_balance;
            $transaction->name = $user->name;
            $transaction->statusamount = "debit";
            $transaction->last_name = $user->last_name;
            $transaction->description = "One-time Enrollment fee deducted from " . $user->name . " " . $user->last_name . ".";
            $transaction->bill_status = "Added";
            $transaction->status = 1;
            $transaction->sum_of_credit = 1;
            $transaction->save();
            /////////////////Intrustpit Ledger/////////////////////
            $data = User::find($user->id);
            $data->registration_fee = 1;
            $data->save();
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->chart_of_account = $admin->id;
            $transaction->admin_user_name = $uid->name;
            $transaction->admin_last_name = $uid->last_name;
            $transaction->deduction = $request->registration_fee_amount;
            $transaction->cbalance = $admin->user_balance;
            $transaction->name = $user->name;
            $transaction->statusamount = "credit";
            $transaction->last_name = $user->last_name;
            $transaction->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction->payment_number = $request->card_no;
            }
            $transaction->transaction_type = "Operational";
            $transaction->description = "One-time Enrollment fee deposited into intrustpit account from " . $user->name . " " . $user->last_name . ".";
            $transaction->bill_status = "Added";
            $transaction->status = 1;
            $transaction->sum_of_credit = 1;
            $transaction->save();

            $data = User::find($user->id);
            $data->registration_fee = 1;
            $data->save();
            //////////////////////Customer Ledger////////////////////////
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->admin_user_name = $uid->name;
            $transaction->admin_last_name = $uid->last_name;
            $transaction->deduction = $request->registration_fee_amount;
            $transaction->cbalance = $user->user_balance - $request->registration_fee_amount;
            $transaction->name = $user->name;
            $transaction->statusamount = "debit";
            $transaction->last_name = $user->last_name;
            $transaction->payment_method = $request->payment_type;
            if ($request->cheque_no) {
                $transaction->payment_number = $request->cheque_no;
            }
            if ($request->trans_no) {
                $transaction->payment_number = $request->trans_no;
            }
            if ($request->card_no) {
                $transaction->payment_number = $request->card_no;
            }
            $transaction->transaction_type = "Operational";
            $transaction->description = "One-time Enrollment fee charged from your account.";
            $transaction->bill_status = "Added";
            $transaction->status = 1;
            $transaction->save();
            $data = User::find($user->id);
            $data->user_balance = $user->user_balance - $request->registration_fee_amount;
            $data->save();
            $newbalance = $newbalance - $request->registration_fee_amount;
        }
        /////////////User Add Balance Notification/////////////
        $notifcation = new Notifcation();
        $notifcation->user_id = $user->id;
        $notifcation->name = $user->name . " " . $user->last_name;
        $notifcation->description = "Your intrustpit account has been topped up successfully with amount $" . $request->balance . ".";
        $notifcation->title = 'Balance Added';
        $notifcation->status = 0;
        $notifcation->save();

        $details = User::find($user->id);
        $subject = "Balance Added";
        $name = $user->name . ' ' . $user->last_name;
        $email_message = "Your intrustpit account has been topped up successfully with amount $" . $request->balance . ". Now you can add bills using your Intrustpit account! Please use the button below to add bills:";
        $url = '/claims/create';
        if ($user->notify_by == "email") {
            // SendEmailJob::dispatch($user->email,$subject,$name,$email_message,$url);
        } else {

        }
        //\Mail::to($user->email)->send(new \App\Mail\AddBalancemail($details,$request->balance));
        alert()->success('Balance Added', 'User balance has been added');
        return redirect("all_users");
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

