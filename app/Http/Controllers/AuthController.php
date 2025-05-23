<?php
namespace App\Http\Controllers;

use App\Jobs\sendEmailJob;
use App\Models\Category;
use App\Models\City;
use App\Models\Claim;
use App\Models\contacts;
use App\Models\Followup;
use App\Models\Lead;
use App\Models\Notifcation;
use App\Models\Referral;
use App\Models\Transaction;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Cookie;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Session;
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

        $app_name = config('app.professional_name');

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($role && $role != "User") {
            if ($request->role == 'User') {
                $request->validate([
                    'name'           => 'required',
                    'email'          => 'required|email|unique:users',
                    'billing_method' => 'required',
                ]);
            }
            if ($request->role != 'User') {
                $request->validate([
                    'name'  => 'required',
                    'email' => 'required|email|unique:users',
                    // 'billing_cycle' => 'required',
                    // 'surplus_amount' => 'required|numeric|lt:10000|gt:0'
                ]);
            }

        } else {

            $dt     = new Carbon();
            $before = $dt->subYears(16)->format('Y-m-d');
            $request->validate([
                'profile_pic'    => 'required|mimes:jpeg,png,jpg,gif,pdf',
                'name'           => 'required',
                'terms'          => 'required',
                'email'          => 'required|email|unique:users',
                'password'       => 'min:6|required_with:confirm_password|same:confirm_password|min:6|max:20',
                'last_name'      => 'required',
                'full_ssn'       => 'required',
                'DOB'            => 'required|date|before:' . $before,
                'address'        => 'required',
                'state'          => 'required',
                'city'           => 'required',
                'zipcode'        => 'required',
                'marital_status' => 'required',
                'gender'         => 'required',
                'billing_method' => 'required',
                'phone'          => 'required',
                'docs.*'         => 'required|mimes:jpg,png,pdf',
            ], [
                'profile_pic.required'    => 'Photo ID is required',
                'profile_pic.mimes'       => 'Photo ID must be a type of jpeg,png or pdf',
                'name.required'           => 'First name field is required',
                'terms.required'          => 'Please accept privacy policy and terms of service',
                'email.required'          => 'Email field is required',
                'password.required'       => 'Password field is required',
                'last_name.required'      => 'Last name field is required',
                'full_ssn.required'       => 'SSN field is required',
                'state.required'          => 'State field is required',
                'address.required'        => 'Address field is required',
                'city.required'           => 'City field is required',
                'zipcode.required'        => 'Zipcode field is required',
                'marital_status.required' => 'Marital status field is required',
                'gender.required'         => 'Gender field is required',
                'billing_method.required' => 'Billing method field is required',
                'phone.required'          => 'Phone field is required',
                'DOB.required'            => "Date of birth field is required",
                'DOB.before'              => "Age should be greater than 16 years",
            ]);
        }

        $user = new User();

        if ($role != "User") {
            $user->role           = ucfirst(trans($request->role));
            $user->billing_method = 'manual';
            $user->account_status = $request->account_status;
            $user->assignRole(strtolower($request->role));
        }
        if (! $role && $request->role == "User") {
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
            $user->assignRole('user');
            $user->role = "User";
        }

        $user->name      = $request->name;
        $user->last_name = $request->last_name;
        $user->full_ssn  = $request->full_ssn;
        $user->dob       = $request->DOB;
        $user->address   = $request->address;
        $user->state     = $request->state;
        $user->city      = $request->city;
        $user->phone     = "+1{$request->phone}";

        if ($request->role == 'User') {
            $user->billing_method = $request->billing_method;
            $user->account_status = User::Pending;
        }

        if ($role and $role != "User") {
            $user->account_status = User::Approved;
        }

        $user->billing_cycle = $request->billing_cycle;

        if ($request->surplus_amount) {
            $user->surplus_amount = $request->surplus_amount;
        }

        $user->zipcode            = $request->zipcode;
        $user->marital_status     = $request->marital_status;
        $user->gender             = $request->gender;
        $user->date_of_withdrawal = $request->date_of_withdrawal;
        $user->email              = $request->email;
        $user->user_balance       = '0';
        $user->token              = $request->_token . rand();
        $user->password           = Hash::make($request->password);
        $user->last_renewal_at    = Carbon::now();
        $user->next_renewal_at    = Carbon::now()->addYear();
        $res                      = $user->save();
        $id                       = $user->id;
        $name                     = $request->name;
        $user                     = User::find($user->id);

        if ($role && $role != "User") {

            $details = $user;

            $directory = storage_path("app/public/$user->id");
            if (! is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user])
                ->setOption([
                    'fontDir'     => public_path('/fonts'),
                    'fontCache'   => public_path('/fonts'),
                    'defaultFont' => 'Nominee-Black',
                ])
                ->setPaper('A4', 'portrait');

            $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';

            $pdf->save($savePath);

            Mail::to($request->email)->send(new \App\Mail\Register($details, $savePath));

        } else {

            $details = $user;
            Mail::to($request->email)->send(new \App\Mail\registermail($details));

            $admins_notification = User::where('role', "admin")->get();

            $ignore_admin_notification = ignoreAdminEmails();

            foreach ($admins_notification as $notify) {

                /////////////// Admin Notification//////////
                if (in_array($notify->email, $ignore_admin_notification)) {
                    continue;
                }

                $notifcation              = new Notifcation();
                $notifcation->user_id     = $notify->id;
                $notifcation->name        = $request->name;
                $notifcation->description = $request->name . ' ' . $request->last_name . " has registered with {$app_name}.";
                $notifcation->title       = 'New User';
                $notifcation->status      = 0;
                $notifcation->save();
                $subject       = "New user!";
                $name          = "{$notify->name} {$notify->last_name}";
                $email_message = $request->name . ' ' . $request->last_name . " has registered with Senior Life Care Trusts and waiting for approval. Please preview the profile in order to approve it:";
                $url           = url("/show_user/{$user->id}");
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
                return response()->json(['header' => 'User Registered', 'message' => 'Thank you for choosing ' . $app_name . '. We are reviewing your request at the moment. You will receive an email once your account is approved or if we need more information. For immediate assistance, please call ' . config('app.contact'), 'type' => "success"]);
            }
        } else {
            return back()->with('fail', 'Something went wrong!');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
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
            $claims    = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data      = compact('claims', 'search', 'all_users');
            return view('claims.search')->with($data);

        } else {
            $all_users = User::all();
            $claims    = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $user      = User::orderBy('id')->paginate(10);
            $data      = compact('claims', 'search', 'user', 'all_users');
            return view('claims.search')->with($data);
        }
    }

    public function search_user_claim(Request $request)
    {
        $search  = $request->input('search', '');
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
            Session::forget('loginId');
            return redirect('/');
        }
    }

    public function all_users(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%.")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data   = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {
            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $user   = User::whereDoesntHave('roles', function ($query) {
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
            $data   = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {

            $claims = Claim::orderBy('id', 'desc')->paginate(10);
            $roles  = Role::all();
            $data   = compact('claims', 'search', 'roles');
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

    public function notifications($id = null)
    {
        $user = User::find(Session::get('loginId'));

        if (! $user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        if ($id) {

            $notification = Notifcation::with('referralName')->where('id', $id)
                ->where('user_id', $user->id)
                ->first();

            if ($notification) {

                $notification->status = '1';
                $notification->save();
                $notifications = collect([$notification]);
            } else {
                return redirect()->back()->with('error', 'Notification not found.');
            }
        } else {

            $notifications = Notifcation::with('referralName')->where('user_id', $user->id)
                ->orderBy('id', 'desc')
                ->get();

            foreach ($notifications as $notification) {
                $notification->status = '1';
                $notification->save();
            }
        }

        return view("notifcation", compact('notifications', 'id'));
    }

    public function bill_reports(Request $request)
    {
        $auth = Auth::user();
        $role = $auth ? $auth->role : null;

        $pool_fund = Transaction::where('user_id', "!=", \Company::Account_id)->sum('credit')
         - Transaction::where('user_id', "!=", \Company::Account_id)->sum('debit');

        $bill_payments = Transaction::whereNotNull("claim_id")->sum('credit') - Transaction::whereNotNull("claim_id")->sum('debit');

        $total_accounts  = User::where('role', 'Vendor')->count();
        $total_contacts  = Contacts::count();
        $total_leads     = Lead::count();
        $total_referrals = Referral::count();
        $customer        = 'all';

        $loggedInUser = User::where('id', '=', Session::get('loginId'))->first();

        if ($request->customer && $request->to && $request->from) {

            $to       = $request->to;
            $from     = $request->from;
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

            $to   = "";
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

        $followup  = Followup::with('referralName')->select('note', 'date', 'referral_id')->get();
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

        $user = User::findOrFail($id);

        return view("add_balance", compact('user'));

    }

    public function show_user(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $from = "";
        $to   = "";

        $vod_documents = $user->transactions()
            ->select('user_id', 'vod_link', 'created_at')
            ->whereNotNull('vod_link')
            ->distinct()
            ->get();

        $transactions = $user->transactions;

        return view("edit_user", compact('user', 'vod_documents', 'transactions', 'from', 'to'));
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
            'claim_user'   => $request->id,
            'claim_status' => 'Pending',
            'archived'     => null,
        ])->pluck('id')->map(function ($id) {
            return " Bill#$id";
        })
            ->toArray();
        return response()->json($pending_bills);
    }
    public function update_existing_user(Request $request, $id)
    {
        $app_name = config('app.professional_name');
        if ($request->has('approval_action')) {
            $user                 = User::find($id);
            $user->account_status = $request->account_status;
            $user->save();
            if ($request->account_status == "Approved") {

                $status = "Approved";

                $details = $user;

                $directory = storage_path("app/public/$user->id");

                if (! is_dir($directory)) {
                    mkdir($directory, 0777, true);
                }

                $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user])
                    ->setOption([
                        'fontDir'     => public_path('/fonts'),
                        'fontCache'   => public_path('/fonts'),
                        'defaultFont' => 'Nominee-Black',
                    ])
                    ->setPaper('A4', 'portrait');

                $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';

                $pdf->save($savePath);

                Mail::to($user->email)->send(new \App\Mail\UserStatus($details, $savePath));

            } elseif ($request->account_status == "Not Approved") {
                $status  = "Not Approved";
                $details = [
                    'title' => 'Mail from ' . $app_name,
                    'body'  => 'Your ' . $app_name . ' account has been rejected.',
                ];
                Mail::to($user->email)->send(new \App\Mail\RejectProfile($user->name));
            } elseif ($request->account_status == "Disable") {

                $status = "Disabled";
                if ($request->approval_action != '1') {
                    $log_id = createLog('User', Session::get('loginId'), $id, "The " . $user->full_name() . "'s account has been deactivated, and their pending bills: " . $request->approval_action . " have been moved to the archives.");
                    Claim::where([
                        'claim_user'   => $id,
                        'claim_status' => 'Pending',
                    ])->update(['archived' => $log_id]);
                }

                Mail::to($user->email)->send(new \App\Mail\DeactivateProfile($user->name));

            }
            alert()->success('Account ' . $status . '!', 'Customer account has been updated successfully!');
            return redirect("all_users");
        }

        $dt     = new Carbon();
        $before = $dt->subYears(16)->format('Y-m-d');

        $this->validate($request, [
            'dob' => 'date|before:' . $before,
        ], [
            'dob.required' => "Date of birth field is required",
            'dob.before'   => "Age should be greater than 16 years",
        ]);

        $user            = User::find($id);
        $user->name      = $request->name;
        $user->last_name = $request->last_name;
        $user->full_ssn  = $request->full_ssn;
        $user->dob       = $request->dob;
        $user->address   = $request->address;
        $user->apt_suite = $request->apt_suite;
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

        if ($request->hasfile('profile_pic')) {
            $this->validate($request, [
                'profile_pic' => 'required|mimes:jpeg,png,jpg,gif,pdf',
            ], [
                'profile_pic.required' => 'Photo Id is required',
                'profile_pic.mimes'    => 'Photo Id must be an image or pdf',
            ]);
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
        }

        $user->phone = $request->phone;
        $user->save();

        alert()->success('Profile updated!', 'Profile has been updated successfully!');
        return redirect("profile_setting");
    }

    public function update_existing_user_profile(Request $request, $id)
    {
        $dt     = new Carbon();
        $before = $dt->subYears(16)->format('Y-m-d');
        $request->validate([
            'fname'          => 'required',
            'last_name'      => 'required',
            'profile_pic'    => 'mimes:jpeg,png,jpg,gif,pdf',
            'email'          => 'required|email|unique:users,email,' . $id,
            'billing_cycle'  => 'required',
            'surplus_amount' => 'nullable|numeric|lt:10000|gt:0',
            'password'       => 'nullable|min:6|max:20',
            // 'dob' => 'date|before:'.$before,
        ], [
            'profile_pic.required' => 'Photo ID is required',
            'profile_pic.mimes'    => 'Photo ID must be a type of jpeg,png or pdf',
            'email.required'       => 'Email field is required',
            'dob.before'           => "Age should be greater than 16 years",
        ]);
        $user            = User::findOrFail($id);
        $user->name      = $request->fname;
        $user->last_name = $request->last_name;
        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'unique:users',
            ]);
            $user->email = $request->email;
        }
        $user->full_ssn      = $request->full_ssn;
        $user->dob           = $request->dob;
        $user->address       = $request->address;
        $user->apt_suite     = $request->apt_suite;
        $user->state         = $request->state;
        $user->city          = $request->city;
        $user->notify_before = $request->notify_before;
        $user->zipcode       = $request->zipcode;
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
                'profile_pic.mimes'    => 'Photo Id must be an image or pdf',
            ]);
            $attachment = rand() . $request['profile_pic']->getClientOriginalName();
            $request->profile_pic->move(public_path('/img'), $attachment);
            $user->profile_pic = $attachment;
        }
        $user->phone          = $request->phone;
        $user->gender         = $request->gender;
        $user->billing_cycle  = $request->billing_cycle;
        $user->surplus_amount = $request->surplus_amount;
        // $user->date_of_withdrawal = $request->date_of_withdrawal;
        $user->email = $request->email;
        $user->save();

        $role = User::where('id', '=', Session::get('loginId'))->value('role');

        if ($request->send_welcome_email && $role && $role != "User") {

            $directory = storage_path("app/public/$user->id");
            if (! is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user])
                ->setOption([
                    'fontDir'     => public_path('/fonts'),
                    'fontCache'   => public_path('/fonts'),
                    'defaultFont' => 'Nominee-Black',
                ])
                ->setPaper('A4', 'portrait');

            $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';

            $pdf->save($savePath);

            Mail::to($request->email)->send(new \App\Mail\Register($user, $savePath));
        }

        alert()->success('Profile updated!', 'Profile has been updated successfully!');

        return redirect("all_users");
    }

    public function add_user_balance(Request $request, $id)
    {
        $this->validate($request, [
            'payment_type'            => 'nullable|required_if:payment_type,on',
            'balance'                 => 'nullable|numeric|gt:0',
            'date_of_trans'           => ['nullable', 'required_if:add_balance,on', 'date', function ($attribute, $value, $fail) use ($request) {
                if ($request->has('add_balance') && $request->add_balance === 'on' && empty($value)) {
                    $fail('The Transaction Date field is required when Add Balance is checked.');
                }
            }],
            'trans_no'                => ['nullable', 'string', function ($attribute, $value, $fail) use ($request) {
                if ($request->payment_type === 'ACH' && $request->has('add_balance') && $request->add_balance === 'on' && empty($value)) {
                    $fail('The Transaction No. field is required for ACH payments when Add Balance is checked.');
                }
            }],
            'check_no'                => ['nullable', 'string', function ($attribute, $value, $fail) use ($request) {
                if ($request->payment_type === 'Check Payment' && $request->has('add_balance') && $request->add_balance === 'on' && empty($value)) {
                    $fail('The Check No. field is required for Check Payment when Add Balance is checked.');
                }
            }],
            'card_no'                 => ['nullable', 'string', function ($attribute, $value, $fail) use ($request) {
                if ($request->payment_type === 'Card' && $request->has('add_balance') && $request->add_balance === 'on' && empty($value)) {
                    $fail('The Card No. field is required for Card payments when Add Balance is checked.');
                }
            }],
            'maintenance_fee_check'   => 'nullable',
            'maintenance_fee'         => 'nullable|numeric|min:0',
            'registration_fee'        => 'nullable',
            'maintenance_fee_type'    => ['nullable', 'string', 'in:percentage,fixed', function ($attribute, $value, $fail) use ($request) {
                if ($request->has('add_balance') && $request->add_balance === 'on' &&
                    $request->has('maintenance_fee_check') && $request->maintenance_fee_check === 'on' &&
                    empty($value)) {
                    $fail('The Maintenance Fee Type field is required when both Add Balance and Maintenance Fee are checked.');
                }
            }],
            'registration_fee_amount' => 'nullable|numeric|min:0',
        ], [
            'date_of_trans.required_if' => 'Transaction date field is required when Add Balance is checked.',
            'trans_no.required_if'      => 'Transaction No. is required for ACH payments when Add Balance is checked.',
            'check_no.required_if'      => 'Check No. is required for Check Payment when Add Balance is checked.',
            'card_no.required_if'       => 'Card No. is required for Card payments when Add Balance is checked.',
        ]);

        $user     = User::findOrFail($id);
        $admin    = User::findOrFail(\Company::Account_id);
        $app_name = config('app.professional_name');

        $deposit_transaction      = null;
        $registration_transaction = null;
        $maintenance_transaction  = null;
        $credit_card_transaction  = null;
        $maintenance_fee_amount   = null;

        $depost_amount    = $request->balance ? (float) $request->balance : 0;
        $remaining_amount = $depost_amount;

        if ($request->maintenance_fee_check) {
            $maintenance_fee_amount = $request->maintenance_fee_type === 'percentage' ? $depost_amount * ($request->maintenance_fee / 100) : $request->maintenance_fee;
        }

        $userBalance = userBalance($id);

        if ($user->account_status !== "Approved") {
            return response()->json([
                'success' => false,
                'header'  => 'Insufficient balance!',
                'message' => "Please approve {$user->name}'s profile to add balance!",
            ]);
        }

        if ($userBalance + $depost_amount < $maintenance_fee_amount) {

            return response()->json([
                'success' => false,
                'header'  => 'Insufficient balance!',
                'message' => "{$user->name}'s balance is insufficient to charge Maintenance fee.",
            ]);
        }

        if ($request->registration_fee) {
            $deduction = $maintenance_fee_amount + $request->registration_fee_amount;
            if ($deduction > $userBalance + $depost_amount) {
                return response()->json([
                    'success' => false,
                    'header'  => 'Insufficient!',
                    'message' => "{$user->name}'s balance is insufficient to charge Enrollment fee.",
                ]);
            }
        }

        DB::beginTransaction();

        try {

            $transactionId = $request->trans_no ?: ($request->check_no ?: ($request->card_no ?: 'N/A'));
            $reference_id  = generateTransactionId();

            $transactionDate = Carbon::parse($request->date_of_trans)->format('m/d/Y');

            if ($request->has('add_balance') && $depost_amount > 0) {

                $description          = "Deposit of \${$depost_amount} made via {$request->payment_type} on {$transactionDate}. Transaction ID: #{$transactionId}.";
                $customer_description = "\${$depost_amount} added in account on {$transactionDate} against {$request->payment_type} Transaction ID: #{$transactionId}.";

                $admin->transactions()->create([
                    "debit"         => $depost_amount,
                    "description"   => $description,
                    "type"          => Transaction::Deposit,
                    "reference_id"  => $reference_id,
                    "date_of_trans" => $request->date_of_trans,

                ]);

                $deposit_transaction = $user->transactions()->create([
                    "reference_id"  => $reference_id,
                    "credit"        => $depost_amount,
                    "description"   => $customer_description,
                    "type"          => Transaction::Deposit,
                    "date_of_trans" => $request->date_of_trans,

                ]);
            }

            $reference_id = generateTransactionId();

            if ($request->has('maintenance_fee_check') && $maintenance_fee_amount > 0) {

                $platform_fee_description          = "Maintenance fee of \${$maintenance_fee_amount} has been charged.";
                $customer_platform_fee_description = "Maintenance fee of \${$maintenance_fee_amount} deducted.";

                $maintenance_transaction = $user->transactions()->create([
                    "reference_id"     => $reference_id,
                    "debit"            => $maintenance_fee_amount,
                    "type"             => Transaction::MaintenanceFee,
                    "description"      => $customer_platform_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);

                $admin->transactions()->create([
                    "reference_id"     => $reference_id,
                    "credit"           => $maintenance_fee_amount,
                    "type"             => Transaction::MaintenanceFee,
                    "description"      => $platform_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);

                $remaining_amount -= $maintenance_fee_amount;
            }

            if ($request->registration_fee && $request->registration_fee_amount > 0) {
                $registration_fee_description      = "A one-time enrollment fee of \${$request->registration_fee_amount} has been charged.";
                $customer_registration_description = "A one-time Enrollment fee of \${$request->registration_fee_amount} deducted.";

                $reference_id = generateTransactionId();

                $registration_transaction = $user->transactions()->create([
                    "reference_id"     => $reference_id,
                    "type"             => Transaction::EnrollmentFee,
                    "debit"            => $request->registration_fee_amount,
                    "description"      => $customer_registration_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);

                $admin->transactions()->create([
                    "reference_id"     => $reference_id,
                    "type"             => Transaction::EnrollmentFee,
                    "credit"           => $request->registration_fee_amount,
                    "description"      => $registration_fee_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);

                $remaining_amount -= $request->registration_fee_amount;
            }

            if ($request->send_amount_to_credit_card && $remaining_amount > 0) {
                $amount_credited_description         = "Amount \${$remaining_amount} is transferred in customer's credit card.";
                $customer_amount_debited_description = "Amount \${$remaining_amount} is received in credit card.";

                $reference_id = generateTransactionId();

                $credit_card_transaction = $user->transactions()->create([
                    "reference_id"     => $reference_id,
                    "type"             => Transaction::CreditCard,
                    "debit"            => $remaining_amount,
                    "description"      => $customer_amount_debited_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);

                $admin->transactions()->create([
                    "reference_id"     => $reference_id,
                    "type"             => Transaction::CreditCard,
                    "credit"           => $remaining_amount,
                    "description"      => $amount_credited_description,
                    "transaction_type" => \TransactionType::Operational,
                    "date_of_trans"    => $request->date_of_trans,

                ]);
            }

            $directory = public_path("storage/{$user->id}/vod_letters");
            if (! is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            if (! empty($deposit_transaction) || ! empty($registration_transaction)) {
                $pdf = PDF::loadView('document.trusted-surplus-pdf', [
                    'user'                     => $user,
                    "deposit_transaction"      => $deposit_transaction,
                    "registration_transaction" => $registration_transaction,
                    "maintenance_transaction"  => $maintenance_transaction,
                ])
                    ->setOption([
                        'fontDir'     => public_path('/fonts'),
                        'fontCache'   => public_path('/fonts'),
                        'defaultFont' => 'Nominee-Black',
                    ])
                    ->setPaper('A4', 'portrait');

                $file_name = 'VOD_' . $user->full_name() . "_" . date('F_Y_His') . ".pdf";
                $file_path = "$directory/$file_name";
                $pdf->save("$directory/$file_name");
                if (file_exists($file_path)) {
                    if (! empty($deposit_transaction)) {
                        $deposit_transaction->update(["vod_link" => $file_name]);
                    }
                    if (! empty($registration_transaction)) {
                        $registration_transaction->update(["vod_link" => $file_name]);
                    }
                } else {
                    Log::error("PDF generation failed: {$file_path}");
                }
            }

            Notifcation::create([
                "status"      => 0,
                "user_id"     => $user->id,
                "title"       => 'Balance Added',
                "name"        => "{$user->name} {$user->last_name}",
                "description" => "Your {$app_name} account has been topped up successfully with amount \${$depost_amount}",
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'header'  => 'Successfull!',
                'message' => "Action performed successfully",
            ]);

        } catch (\Exception $e) {
            DB::rollback();

            errorLogs($e->getMessage());
            return response()->json([
                'success' => false,
                'header'  => 'Error!',
                'message' => "Something went wrong. Please try again." . $e->getMessage(),
            ]);
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
            $user      = User::where('id', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%.")->orwhere('last_name', 'LIKE', "%$search%")->orwhere('role', 'LIKE', "%$search%")->orwhere('account_status', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('address', 'LIKE', "%$search%")->orwhere('zipcode', 'LIKE', "%$search%")->get();
            $data      = compact('user', 'search', 'all_users');
            return view('usersearch')->with($data);

        } else {
            $all_users = User::all();
            $user      = User::where('id', 'LIKE', "%$search%")->orwhere('name', 'LIKE', "%$search%.")->orwhere('last_name', 'LIKE', "%$search%")->orwhere('role', 'LIKE', "%$search%")->orwhere('account_status', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->orwhere('address', 'LIKE', "%$search%")->orwhere('zipcode', 'LIKE', "%$search%")->get();
            $user      = User::orderBy('id')->paginate(10);
            $data      = compact('user', 'search', 'user', 'all_users');
            return view('usersearch')->with($data);
        }
    }

    public function search_transaction_data(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $all_users   = User::all();
            $transaction = Transaction::where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();

            return view('transactionsearch', compact('transaction'));

        } else {
            $all_users   = User::all();
            $transaction = Transaction::where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();
            $user        = User::orderBy('id')->paginate(10);
            return view('transactionsearch', compact('transaction'));
        }
    }

    public function search_transaction_user_data(Request $request)
    {
        $search = $request['search'] ?? "";
        $id     = User::where('id', '=', Session::get('loginId'))->value('id');
        if ($search != "") {
            $all_users   = User::all();
            $transaction = Transaction::where("user_id", $id)->where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();

            return view('transactionsearch', compact('transaction'));

        } else {
            $all_users   = User::all();
            $transaction = Transaction::where("user_id", $id)->where('id', 'LIKE', "$search")->orwhere('name', 'LIKE', "%$search%.")->orwhere('amount', 'LIKE', "%$search%")->orwhere('description', 'LIKE', "%$search%")->orwhere('admin_user_name', 'LIKE', "%$search%")->orwhere('bill_status', 'LIKE', "%$search%")->get();
            $user        = User::orderBy('id')->paginate(10);
            return view('transactionsearch', compact('transaction'));
        }
    }

    public function vendor_dashboard(Request $request)
    {
        $vendor = User::where('id', Session::get('loginId'))
            ->first();

        $referralsOfVendor = $vendor->referrals;

        $contacts            = $vendor->contacts;
        $referralsOfContacts = $contacts->flatMap(function ($contact) {
            return $contact->referrals;
        });
        $referrals = $referralsOfVendor->merge($referralsOfContacts)->sortByDesc('id');

        return view('vendors.vendor_dashboard', compact('vendor', 'referrals', 'contacts'));
    }

    public function approvalLetter($id)
    {
        $user = User::findOrFail($id);

        $directory = storage_path("app/public/$user->email");

        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user])
            ->setOption([
                'fontDir'     => public_path('/fonts'),
                'fontCache'   => public_path('/fonts'),
                'defaultFont' => 'Nominee-Black',
            ])
            ->setPaper('A4', 'portrait');

        return $pdf->download("approval-letter-{$user->id}.pdf");
    }

    public function getFilterVodReport(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'startDate' => 'required|date',
            'endDate'   => 'required|date',
        ]);

        $user = User::find($request->user_id);

        $startDate = Carbon::parse($request->startDate)->startOfDay();
        $endDate   = Carbon::parse($request->endDate)->endOfDay();

        $transactions = Transaction::where('user_id', $user->id)
            ->whereNotIn('type', [Transaction::MaintenanceFee, Transaction::CreditCard])
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderByRaw("CASE WHEN type = ? THEN 1 ELSE 2 END", [Transaction::EnrollmentFee])
            ->orderBy('created_at', 'ASC')
            ->get();

        if ($transactions->isEmpty()) {
            return response()->json(['error' => 'No transactions found for the selected date range.'], 404);
        }

        $pdf = PDF::loadView('document.trusted-surplus-report-pdf', [
            'user'         => $user,
            'startDate'    => $startDate,
            'endDate'      => $endDate,
            'transactions' => $transactions,
        ])
            ->setOption([
                'fontDir'     => public_path('/fonts'),
                'fontCache'   => public_path('/fonts'),
                'defaultFont' => 'Nominee-Black',
            ])
            ->setPaper('A4', 'portrait');

        $file_name = 'trusted_' . date('Ymd_His') . ".pdf";

        return $pdf->download($file_name);
    }

}
