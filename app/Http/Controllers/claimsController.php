<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\User;
use App\Models\Category;
use App\Models\Notifcation;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Controllers\AuthController;
use App\Imports\CustomerDepositImport;
use Session;
use Excel;
use Carbon\Carbon;
use App\Jobs\sendEmailJob;
use App\Imports\UsersImport;
use App\Imports\UsersBalanceImport;
use App\Imports\ApprovePendingBills;
use Redirect;
use App\Models\PayeeModel;

class claimsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        ini_set('memory_limit', '512M');
        $search = $request['search'] ?? "";
        if ($search != "") {
            $claims = Claim::orderBy('id', 'desc')->get();
            $all_users = User::all();
            $total_users = DB::table('users')->count('id');
            $user_balance = DB::table('users')->sum('user_balance');
            $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
            $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
            $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
            $sum_refused = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'refused')->count('id');
            $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
            $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
            $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
            $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
            $sum_claims = DB::table('claims')->count('id');
            $sum_claims_amount = DB::table('claims')->sum('claim_amount');
            $claim_details = Claim::where('claim_user',$request->search)->where('archived',null)->get();
            $transaction=Transaction::orderBy('id','desc')->get();
            $transaction = $transaction->where('chart_of_account','!=','');
            $data =  compact('claims','search', 'claim_details','sum_processed', 'sum_claims','sum_claims_amount', 'sum_processed_amount', 'sum_pending', 'sum_processed_amount', 'sum_pending_amount', 'sum_approved' ,'sum_approved_amount', 'sum_refused','sum_refused_amount', 'total_users', 'user_balance','all_users','transaction');
            return view ('dashboard')->with($data);
        } else {


            $role = User::where('id', '=', Session::get('loginId'))->value('role');
            //dd($role);

            if ($role != 'User'){
             $claims = Claim::orderBy('id', 'desc')->get();
             $claim_details = Claim::orderBy('id', 'desc')->where('archived',null)->take(200)->get();
             $all_users = User::all();
            $total_users = DB::table('users')->count('id');
            $user_balance = DB::table('users')->sum('user_balance');
            $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
            $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
            $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
            $sum_refused = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'refused')->count('id');
            $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
            $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
            $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
            $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
            $sum_claims = DB::table('claims')->count('id');
            $sum_claims_amount = DB::table('claims')->sum('claim_amount');
            }else if ($role == 'User'){
                $all_users = User::all();
            $total_users = DB::table('users')->count('id');
            $user_balance = DB::table('users')->sum('user_balance');
            $sum_processed = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'processed')->count('id');
            $sum_pending = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'pending')->count('id');
            $sum_approved = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'approved')->count('id');
            $sum_refused = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'refused')->count('id');
            $sum_processed_amount = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'processed')->sum('claim_amount');
            $sum_approved_amount = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'approved')->sum('claim_amount');
            $sum_refused_amount = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'refused')->sum('claim_amount');
            $sum_pending_amount = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'pending')->sum('claim_amount');
            $sum_claims = DB::table('claims')->where('claim_user' , Session::get('loginId'))->count('id');
            $sum_claims_amount = DB::table('claims')->where('claim_user' , Session::get('loginId'))->sum('claim_amount');
                $claims = Claim::orderBy('id', 'desc')->where('claim_user' , Session::get('loginId'))->where('archived',null)->get();
            $claim_details = '';
            }else if($role=='Moderator'){
                 $claims = Claim::orderBy('id', 'desc')->where('archived',null)->get();
                 $all_users = User::all();
                $total_users = DB::table('users')->count('id');
                $user_balance = DB::table('users')->sum('user_balance');
                $sum_processed = DB::table('claims')->where('claim_status', 'processed')->count('id');
                $sum_pending = DB::table('claims')->where('claim_status', 'pending')->count('id');
                $sum_approved = DB::table('claims')->where('claim_status', 'approved')->count('id');
                $sum_refused = DB::table('claims')->where('claim_user' , Session::get('loginId'))->where('claim_status', 'refused')->count('id');
                $sum_processed_amount = DB::table('claims')->where('claim_status', 'processed')->sum('claim_amount');
                $sum_approved_amount = DB::table('claims')->where('claim_status', 'approved')->sum('claim_amount');
                $sum_refused_amount = DB::table('claims')->where('claim_status', 'refused')->sum('claim_amount');
                $sum_pending_amount = DB::table('claims')->where('claim_status', 'pending')->sum('claim_amount');
                $sum_claims = DB::table('claims')->count('id');
                $sum_claims_amount = DB::table('claims')->sum('claim_amount');
                $claim_details = '';
            }
            $userid = User::where('id', '=', Session::get('loginId'))->first();
            $transaction=Transaction::orderBy('id','desc')->get();
            if($userid->role != 'User'){
                $transaction = $transaction->where('chart_of_account','!=','');
                }else{
                 $transaction = $transaction->where('user_id',$userid->id)->where('chart_of_account','');
                }
            //dd($claims);
            $data =  compact('claims','search', 'claim_details','sum_processed', 'sum_claims','sum_claims_amount', 'sum_processed_amount', 'sum_pending', 'sum_processed_amount', 'sum_pending_amount', 'sum_approved' ,'sum_approved_amount', 'sum_refused','sum_refused_amount', 'total_users', 'user_balance','all_users','transaction');


            return view ('dashboard')->with($data);
        }
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search');
            return view('claims.search')->with($data);

        } else {

            $role = User::where('id', '=', Session::get('loginId'))->value('role');
            //dd($role);

            if ($role != 'User'){
             $claims = Claim::orderBy('id', 'desc')->paginate(10);
             //$claims = Claim::orderBy('id', 'desc')->onlyTrashed()->paginate(15);
             $all_users = User::all();


            }else if ($role == 'User'){

            $claims = Claim::orderBy('id', 'desc')->where('claim_user' , Session::get('loginId'))->paginate(15);
            $all_users = User::all();

            }

           // $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->paginate(15);
            $data = compact('claims', 'search', 'all_users');
            return view('claims.claims', $data);


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
            //dd($role);

            if ($role != 'User'){
             //$claims = Claim::orderBy('id', 'desc')->paginate(15);
             $claims = Claim::orderBy('id', 'desc')->onlyTrashed()->get();
             $all_users = User::all();


            }else if ($role == 'User'){

            $claims = Claim::orderBy('id', 'desc')->where('claim_user' , Session::get('loginId'))->paginate(15);
            $all_users = User::all();

            }

           // $claims = Claim::orderBy('id', 'desc')->where('claim_user', Session::get('loginId'))->paginate(15);
            $data = compact('claims', 'search', 'all_users');
            return view('claims.deletedclaims', $data);


        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users = User::orderBy('name')->get();
        $categories = Category::all();
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $data = compact('claims', 'search','users');
            return view('claims.search')->with($data);

        } else {
            $payees = PayeeModel::get();
            $claims = Claim::orderBy('id', 'desc')->paginate(10);
            $data = compact('claims', 'search','users' , 'categories','payees');
            return view('claims.add_claim', $data);

        }
        return view('claims.add_claim');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'claim_user' => 'required',
        'claim_category' => 'required',
        'claim_amount' => 'required',
        'claim_bill_attachment'=>'required|mimes:jpg,jpeg,png,gif,pdf|max:6048',
        'recurring_day' => 'required_if:recurring_bill,1'
        // 'payment_method' => 'required',
        // 'card_number'=>'required'
        ],
        [
        'claim_bill_attachment.error'=>'Bill attachment must be an image or pdf',
        'expense_date.required'=>'Due date is required ',
        'claim_user.required' => 'Customer is required',
        'recurring_day.required_if'=>'Please select billing cycle'
        ]
        );

        if($request->has('recurring_bill')){
        $request->validate([
            // 'expense_date' => 'required',
            //'recurring_day'=>'required|integer|between:1,28',
        ]);
        }
        $user = User::find(Session::get('loginId'));
        if($request->has('claim_user')){
            $claim_user = $request->claim_user;
        }else{
            $claim_user = $user->id;
        }
        $claimUser = User::find($claim_user);
        if($claimUser->account_status == 'Disable'){
            return response()->json(['header'=>'User Disabled!','type'=>'warning','message'=> "You cannot add bill against disabled customer."]);
        }
        $intrustpit = User::find(7);
        if($claimUser->user_balance < $request->claim_amount){
            if($user->role != "User" && $request->claim_status == 'Approved'){
                return response()->json(['header'=>'Insufficient balance!','type'=>'warning','message'=>$claimUser->name."'s balance is $".$claimUser->user_balance." which is insufficient to add this bill, Please add balance first."]);
            }else{
            //return response()->json(['header'=>'Insufficient balance!','type'=>'warning','message'=>"Your balance is $".$claimUser->user_balance." which is insufficient to add this bill."]);
        }
        }
        $name=Category::find($request->claim_category);
        $claim = new Claim();
        $claim->claim_user = $claim_user;
        $claim->expense_date = $request->expense_date;
        $claim->claim_description = $request->claim_description;
        $claim->claim_category = $request->claim_category;
        $claim->claim_amount = $request->claim_amount;
        $claim->payee_name = $request->payee_name;
        $claim->account_number = $request->account_number;
        $attachment = rand().$request['claim_bill_attachment']->getClientOriginalName();
        $request->claim_bill_attachment->move(public_path('/img'), $attachment);
        $claim->claim_bill_attachment=$attachment;
        if($request->recurring_bill == 1){
            $claim->recurring_bill = 1;
            $claim->recurring_day = $request->recurring_day;
        }else{
            $claim->recurring_bill = 0;
        }

        if($request->claim_status == 'Approved'){

            $claim->claim_status = 'Approved';
            $claim->save();
            $details = $claim;
            ////////////////Intrustpit Ledger/////////////////
            $transaction=new Transaction();
            $transaction->chart_of_account=$intrustpit->id;
            $transaction->bill_id = $claim->id;
            $transaction->user_id=$claim_user;
            $transaction->name=$user->name;
            $transaction->last_name=$user->last_name;
            $transaction->deduction=$request->claim_amount;
            $transaction->payment_method=$request->payment_method;
            $transaction->payment_number=$request->card_number;
            $transaction->transaction_type="Trusted Surplus";
            $transaction->statusamount="debit";
            $transaction->description="Intruspit has processed ".$claimUser->name." ".$claimUser->last_name."'s payment against bill submitted for ".$name->category_name." category.";
            $transaction->bill_status = 'Deducted';
            $transaction->status = 1;
            $transaction->save();
            ////////////////Customer Ledger/////////////////
            $transaction=new Transaction();
            $transaction->user_id=$claim_user;
            $transaction->bill_id = $claim->id;
            $transaction->name=$user->name;
            $transaction->last_name=$user->last_name;
            $transaction->deduction=$request->claim_amount;
            $transaction->payment_method=$request->payment_method;
            $transaction->payment_number=$request->card_number;
            $transaction->transaction_type="Trusted Surplus";
            $transaction->cbalance=$claimUser->user_balance-$request->claim_amount;
            $transaction->statusamount="debit";
            $transaction->description="Intruspit has processed your payment against bill submitted for ".$name->category_name." category.";
            $transaction->bill_status = 'Deducted';
            $transaction->status = 1;
            $transaction->save();
            ////////////Updating Customer Balance/////////////
            $claimUser->user_balance = $claimUser->user_balance-$request->claim_amount;
            $claimUser->save();
             /////////////User Bill Notification/////////////
            $notifcation=new Notifcation();
            $notifcation->user_id=$claimUser->id;
            $notifcation->name=$claimUser->name;
            $notifcation->bill_id=$claim->id;
            $notifcation->description="Your Bill # ".$claim->id." with $".$request->claim_amount." amount has been added on ".date('m/d/Y',strtotime(now()))." by Intrustpit.";
            $notifcation->title='Bill Approved';
            $notifcation->status = 0;
            $notifcation->save();
            $subject = "Bill Approved";
            $name = $claimUser->name.' '.$claimUser->last_name;
            $email_message = "Your bill#".$details->id." added on ".date('m-d-Y', strtotime($details->created_at))." has been approved. Please use the button below to find the details of your bill:";
            $url = '/claims/'.$details->id;
            if($claimUser->notify_by == "email"){
              //  SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
            }else{

            }
        // \Mail::to($claimUser->email)->send(new \App\Mail\BillApproved($details));
            }else{
                $claim->claim_status = 'Pending';
                $claim->save();
                $details = $claim;
                $subject = "Bill Submitted";
                $name = $claimUser->name.' '.$claimUser->last_name;
                $email_message = "Your bill#".$details->id." has been added on ".date('m-d-Y', strtotime($claim->created_at)).". Please use the button below to find the details of your bill:";
                $url = '/claims/'.$details->id;
                if($claimUser->notify_by == "email"){
                    SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
                }else{
                    notify($claimUser->email,$subject,$name,$email_message,$url);
                }
            $admins_notification = User::where('role','!=',"User")->get();
            $ignore_admin_notification = [
                'devops@napollo.net',
                'svaldivia@trustedsurplus.org',
                'ldurzieh@trustedsurplus.org',
                'rbauman@trustedsurplus.org'
            ];
            foreach($admins_notification as $notify){
                ///////////////Intrustpit Notification//////////
                if(in_array($notify->email,$ignore_admin_notification))
                continue;
                $notifcation=new Notifcation();
                $notifcation->user_id=$notify->id;
                $notifcation->name=$claimUser->name;
                $notifcation->bill_id=$claim->id;
                $notifcation->description="Bill # ".$claim->id." with $".$request->claim_amount." amount has been added by ".$claimUser->name." on ".date('m/d/Y',strtotime(now())).".";
                $notifcation->title='Bill Added';
                $notifcation->status = 0;
                $notifcation->save();
                $details = $claim;
                $subject = "Bill Submitted";
                $name = $notify->name.' '.$notify->last_name;
                $email_message = $claimUser->name.' '.$claimUser->last_name." has submitted bill#".$details->id." on ".date('m-d-Y', strtotime($claim->created_at))." and waiting for approval. Please use the button below to find the details of the bill:";
                $url = '/claims/'.$details->id;
                if($notify->notify_by == "email"){
                    SendEmailJob::dispatch($notify->email,$subject,$name,$email_message,$url);
                }else{

                }
            }
            // \Mail::to('intrustpit@napollo.net')->send(new \App\Mail\BillNotification($details));
        }
        if($request->claim_status != 'Approved'){
         /////////////User Bill Notification/////////////
        $notifcation=new Notifcation();
        $notifcation->user_id=$claimUser->id;
        $notifcation->name=$claimUser->name;
        $notifcation->bill_id=$claim->id;
        $notifcation->description="Your Bill # ".$claim->id." with $".$request->claim_amount." amount has been added on ".date('m/d/Y',strtotime(now())).".";
        $notifcation->title='Bill Added';
        $notifcation->status = 0;
        $notifcation->save();
 
        }
        if($claimUser->user_balance < $request->claim_amount){
        return response()->json(['header'=>'Insufficient balance!','type'=>'success','message'=>" Your bill has been submitted successfully."]);
        }else{
            return response()->json(['header'=>'Bill Submitted !','type'=>'success','message'=>" Your bill has been submitted successfully."]);
        }
        // return back();
    }

    public function show(Request $request, $id)
    {

        $role = User::where('id', '=', Session::get('loginId'))->first();
        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $categories = Category::all();
            $data = compact('claims', 'search' , 'categories');
            return view('claims.search')->with($data);

        } else {

            $users=User::all();
            $claim = Claim::find($id);
            if($role->role != "User"){
            $notification = Notifcation::where('bill_id',$id)->where('user_id',7)->get();
            foreach($notification as $data){
                $status = Notifcation::find($data->id);
                $status->status = '0';
                $status->save();
            }
         }else{
            $notification = Notifcation::where('bill_id',$id)->where('user_id',$role->id)->get();
            foreach($notification as $data){
                $status = Notifcation::find($data->id);
                $status->status = '0';
                $status->save();
            }
        }

             $categories = Category::all();
             if($claim){
                  $data = compact('claim', 'search' , 'categories','users');
                   return view('claims.view')->with($data);
             }else{
                alert()->error('Claim  ', 'Your claim not found! ');
                return back();
             }




        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $search = $request['search'] ?? "";
        if ($search != "") {

            $claims = Claim::where('id', 'LIKE', "%$search%")->orwhere('claim_title', 'LIKE', "%$search%")->orwhere('claim_category', 'LIKE', "%$search%")->orwhere('claim_status', 'LIKE', "%$search%")->orwhere('claim_amount', 'LIKE', "%$search%")->orwhere('submission_date', 'LIKE', "%$search%")->get();
            $categories = Category::all();
            $data = compact('claims', 'search'  , 'categories');
            return view('claims.search')->with($data);

        } else {
            $users=User::all();
            $claim = Claim::find($id);
            $categories = Category::all();
            $data = compact('claim', 'search'  , 'categories','users');
            return view('claims.edit')->with($data);

        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
        'claim_status'=>'required',
        'recurring_day'=>'required_if:recurring_bill,1'
        ],
        [
        'claim_bill_attachment.error'=>'Bill attachment must be an image or pdf',
        'expense_date.required'=>'Due date is required ',
        'claim_status.required'=>'Bill cannot update with pending status',
        'recurring_day.required_if'=>'Please select billing cycle'
        ]
        );
        if($request->has('recurring_bill')){
        $request->validate([
            //'expense_date' => 'required',
            // 'recurring_day'=>'required|integer|between:1,28',
        ],[
            'recurring_day.required'=>'Recurring day is required for recurring bills',
            'recurring_day.between'=>'Recurring day must be a day between 1 to 28'
        ]);
        }
        if($request->claim_status == "Partial"){
            $request->validate([
                'partial_amount'=>'required|min:1',
                'reason'=>'required'
            ],[
                'partial_amount.required'=>'Partial amount is required ',
                'reason.required'=>'Please specify reason for partially approved bill'
            ]);
            $claim_amount = $request->partial_amount;
        }else{
            $claim_amount = $request->claim_amount;
        }
        if($request->claim_status != "Refused"){
            $request->validate([
                'payment_method'=>'required',
                'card_number'=>'required',
            ],[
              'payment_method.required'=>'Payment method is required',
              'card_number.required' =>'Payment number is required'
            ]);
        }
        $name=Category::find($request->claim_category);
        $user = User::find(Session::get('loginId'));
        if($request->has('claim_user')){
            $claim_user = $request->claim_user;
        }else{
            $claim_user = $user->id;
        }
        $claimUser = User::find($claim_user);
        $intrustpit = User::find(7);
        if($claimUser->user_balance < $claim_amount && $request->claim_status != 'Refused'){
            if($user->role != 'User'){
                return response()->json(['header'=>'Insufficient balance!','type'=>'warning','message'=>$claimUser->name."'s balance is $".$claimUser->user_balance." which is insufficient to add this bill, Please add balance first."]);
            }else{
                Alert::warning('Insufficient balance !',"Your balance is insufficient to add bills,Please request a deposit and try again.")->persistent('Dismiss');;
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
        if($request->claim_status == 'Approved'){
            $claim->claim_status = 'Approved';
            $claim->save();
            ////////////////Customer Ledger/////////////////
            $transaction=new Transaction();
            $transaction->user_id=$claim_user;
            $transaction->bill_id = $claim->id;
            $transaction->name=$user->name;
            $transaction->last_name=$user->last_name;
            $transaction->deduction=$request->claim_amount;
            $transaction->cbalance=$claimUser->user_balance-$request->claim_amount;
            $transaction->payment_method=$request->payment_method;
            $transaction->payment_number=$request->card_number;
            $transaction->transaction_type="Trusted Surplus";
            $transaction->statusamount="debit";
            $transaction->description="Intruspit has processed your payment against your bill submitted for ".$name->category_name." category.";
            $transaction->bill_status = 'Deducted';
            $transaction->status = 1;
            $transaction->save();
            ////////////////Intrustpit Ledger/////////////////

            $transaction=new Transaction();
            $transaction->chart_of_account=$intrustpit->id;
            $transaction->bill_id = $claim->id;
            $transaction->user_id=$claim_user;
            $transaction->name=$intrustpit->name;
            $transaction->last_name=$intrustpit->last_name;
            $transaction->deduction=$request->claim_amount;
            $transaction->payment_method=$request->payment_method;
            $transaction->payment_number=$request->card_number;
            $transaction->transaction_type="Trusted Surplus";
            $transaction->statusamount="debit";
            $transaction->description="Intruspit has processed ".$claimUser->name." ".$claimUser->last_name."'s payment against bill submitted for ".$name->category_name." category.";
            $transaction->bill_status = 'Included';
            $transaction->status = 1;
            $transaction->save();
            $details = $claim;
            ////////////Updating Customer Balance/////////////
            $claimUser->user_balance = $claimUser->user_balance-$request->claim_amount;
            $claimUser->save();
            /////////////User Bill Approved Notification/////////////
            $notifcation=new Notifcation();
            $notifcation->user_id=$claimUser->id;
            $notifcation->name=$claimUser->name;
            $notifcation->bill_id=$claim->id;
            $notifcation->description="Your Bill # ".$claim->id." with $".$request->claim_amount." amount added on ".date('m/d/Y',strtotime(now()))." has been approved successfully.";
            $notifcation->title='Bill Approved';
            $notifcation->status = 0;
            $notifcation->save();
            $details = $claim;
            $subject = "Bill Approved";
            $name = $claimUser->name.' '.$claimUser->last_name;
            $email_message = "Your bill#".$details->id." added on ".date('m-d-Y', strtotime($details->created_at))." has been approved. Please use the button below to find the details of your bill:";
            $url = '/claims/'.$details->id;
            if($claimUser->notify_by == "email"){
               // SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
            }else{

            }
            //\Mail::to($claimUser->email)->send(new \App\Mail\BillApproved($details));
            }
            if($request->claim_status == 'Refused'){
                $request->validate([
                    'refusal_reason'=>'required'
                ],[
                    'refusal_reason.required'=>'Refusal reason is required to refuse bill!'
                ]);
                $claim->claim_status = 'Refused';
                $claim->refusal_reason = $request->refusal_reason;
                $claim->save();
                /////////////User Bill Refused Notification/////////////
                $notifcation=new Notifcation();
                $notifcation->user_id=$claimUser->id;
                $notifcation->name=$claimUser->name;
                $notifcation->bill_id=$claim->id;
                $notifcation->description="Your Bill # ".$claim->id." with $".$request->claim_amount." amount added on ".date('m/d/Y',strtotime(now()))." has been refused.";
                $notifcation->title='Bill Refused';
                $notifcation->status = 0;
                $notifcation->save();
                $details = $claim;
                $subject = "Bill Refused";
                $name = $claimUser->name.' '.$claimUser->last_name;
                $email_message = 'Your bill#'.$details->id.' added on '.date('m-d-Y', strtotime($details->created_at)).' has been refused because of the following reason:"'.$details->refusal_reason.'", Please use the button below to find the details of your bill:';
                $url = '/claims/'.$details->id;
                if($claimUser->notify_by == "email"){
                   // SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
                }else{

                }
            }
            if($request->claim_status == "Partial"){
                $claim->claim_status = 'Partially approved';
                $claim->save();
                ////////////////Customer Ledger/////////////////
                $transaction=new Transaction();
                $transaction->user_id=$claim_user;
                $transaction->bill_id = $claim->id;
                $transaction->name=$user->name;
                $transaction->last_name=$user->last_name;
                $transaction->deduction=$claim_amount;
                $transaction->payment_method=$request->payment_method;
                $transaction->payment_number=$request->card_number;
                $transaction->transaction_type="Trusted Surplus";
                $transaction->cbalance=$claimUser->user_balance-$claim_amount;
                $transaction->statusamount="debit";
                $transaction->description="Intruspit has processed your payment against your bill submitted for ".$name->category_name." category.";
                $transaction->bill_status = 'Deducted';
                $transaction->status = 1;
                $transaction->save();
                ////////////////Intrustpit Ledger/////////////////
                $transaction=new Transaction();
                $transaction->chart_of_account=$intrustpit->id;
                $transaction->bill_id = $claim->id;
                $transaction->user_id=$claim_user;
                $transaction->name=$intrustpit->name;
                $transaction->last_name=$intrustpit->last_name;
                $transaction->payment_method=$request->payment_method;
                $transaction->payment_number=$request->card_number;
                $transaction->transaction_type="Trusted Surplus";
                $transaction->deduction=$claim_amount;
                $transaction->statusamount="debit";
                $transaction->description="Intruspit has processed ".$claimUser->name." ".$claimUser->last_name."'s payment against bill submitted for ".$name->category_name." category.";
                $transaction->bill_status = 'Included';
                $transaction->status = 1;
                $transaction->save();
                ////////////Updating Customer Balance/////////////
                $claimUser->user_balance = $claimUser->user_balance-$claim_amount;
                $claimUser->save();
                /////////////User Bill Partically approved Notification/////////////
                $notifcation=new Notifcation();
                $notifcation->user_id=$claimUser->id;
                $notifcation->name=$claimUser->name;
                $notifcation->bill_id=$claim->id;
                $notifcation->description="Your Bill # ".$claim->id." with $".$claim->claim_amount." amount added on ".date('m/d/Y',strtotime(now()))." has been partically approved with amount $".$claim_amount.".";
                $notifcation->title='Partically approved';
                $notifcation->status = 0;
                $notifcation->save();
                $details = $claim;
                $subject = "Partically approved";
                $name = $claimUser->name.' '.$claimUser->last_name;
                $email_message = 'Your bill#'.$details->id.' added on '.date('m-d-Y', strtotime($details->created_at)).' has been partially approved with amount $'.$claim_amount.', Please use the button below to find the details of your bill:';
                $url = '/claims/'.$details->id;
                if($claimUser->notify_by == "email"){
                   // SendEmailJob::dispatch($claimUser->email,$subject,$name,$email_message,$url);
                }else{

                }
                return response()->json(['header'=>'Partially approved!','type'=>'success','message'=>"Bill#".$request->id." has been Partial approved successfully."]);
            }
            return response()->json(['header'=>'Bill '.$request->claim_status.'!','type'=>'success','message'=>"Bill#".$request->id.' has been '.$request->claim_status.' successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->delete();
        return response()->json('success');
        // alert()->success('Claim Deleted', 'Claim has been deleted successfully');
        // return redirect('/claims');
    }

    public function trace_recurring(Request $request){
        
        $page = $request->query('page',1);
        $perPage = 1;
        $claims = Claim::orderBy('created_at', 'desc')
        ->where('recurred','!=','0')
        ->get()
        ->groupBy(function($claim){
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
        return view('claims.trace_recurring',compact('claimsPaginated'));
    }
    public function duplicate_bill(Request $request){
        $this->validate($request,[
            'date'=>'required',
        ],
        [
            'date.required' => 'Please select date first.'
        ]);
        $requestedMonth = date('Y-m', strtotime($request->input('date')));
        $check = Claim::where('recurred', $request->id)
        ->whereRaw('DATE_FORMAT(created_at, "%Y-%m") = ?', [$requestedMonth])
        ->whereNull('deleted_at')
        ->first();
        if(!$check){ 
           $claim = Claim::find($request->id);
           $new_claim = $claim->replicate();
           $new_claim->claim_status = 'Pending';
           $new_claim->partial_amount=null;
           $new_claim->recurring_bill=0;
           $new_claim->recurred=$claim->id;
           $new_claim->recurring_day=null;
           $new_claim->created_at = date('Y-m-d H:i:s', strtotime($request->input('date').' '.now()->format('H:i:s')));
           $new_claim->save();
           return response()->json(['success'=>true, 'message'=>'Bill#'.$request->id.' has been duplicated successfully!']);
        }else{
            return response()->json(['success'=>false, 'message'=>'Bill#'.$request->id.' has already been duplicated on '.$check->created_at->format('m-d-Y').' with bill Id#'.$check->id.'!']);
        }
    }
    public function RestoreBill(Request $request){
        $bill = Claim::withTrashed()->findOrFail($request->id);
        $bill->restore();
        return response()->json('success');
    }
    public function RecurringBills(Request $request)
    {
        $claims = Claim::where('claim_status','!=','Refused')->where('recurring_bill','1')->get();
        return view('claims.recurring',compact('claims'));
    }

    public function RemoveFromRecurring(Request $request)
    {
        $claim = Claim::find($request->id);
        $claim->recurring_bill = '0';
        $claim->save();
       return response()->json(['success' =>'bill # '.$request->id.' has been removed successfully from recurring']);
    }

    public function import(Request $request)
    {
        try {
            Excel::import(new UsersImport,request()->file('import_file'));
            alert()->success('Profiles created', 'User Profiles has been imported successfully');
            return back();
        }catch (\Exception $e){
            alert()->error('Invalid Format', 'Import unsuccessful');
            return back();
        }
        return back();
    }
    public function customerdeposit(Request $request)
    {
        // try {
        // Excel::import(new CustomerDepositImport,request()->file('import_file'));
        Excel::import(new CustomerDepositImport,request()->file('import_file'));
        //     alert()->success('Balance added', 'Deposit has been imported successfully');
        //     return back();
        // }catch (\Exception $e){
        //     alert()->error('Invalid Format', 'Import unsuccessful');
        //     return back();
        // }
        return response()->json(['success' => 'Deposited successfully']);

    }
    public function preview_file(){
        return view('claims.preview_file_data');
    }
    public function update_bills_status(Request $request){
        // dd($request->import_file);
        try{
            Excel::import(new ApprovePendingBills, request()->file('import_file'));
            alert()->success('Bills Approved','Bills have Been approved successfully');
            return back();
        }catch(\Exception $e){
            alert()->error('Invalid Format','Import unsuccessful');
            return back();
        }
        return response()->json('success');
    }
    public function edit_bill($id){
        $claim = claim::find($id);
        // if($claim->claim_status!='Pending'){
        //     alert()->warning('warning !','Only pending bills will be edited');
        //     return back();
        // }
        $users=User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        $payees = PayeeModel::get();
        $data = compact('claim','categories','users','payees');
        return view('claims.edit_bill')->with($data);
    }

    public function edit_recurring_bill($id)
    {
        $users=User::all();
        $claim = Claim::find($id);
        $categories = Category::all();
        $payees = PayeeModel::get();
        $data = compact('claim','categories','users','payees');
        return view('claims.edit_recurring_bills')->with($data);
    }
    public function store_edited_recurring_bill(Request $request)
    {
        $this->validate($request,
        [
            'recurring_day'=>'required'
        ],
        [
            'recurring_day.required'=>'Please select billing cycle'
        ]);
        $claim = Claim::find($request->id);
        $claim->recurring_day = $request->recurring_day;
        $claim_amount = $claim->claim_amount != $request->claim_amount ? "Amount has been changed from ".$claim->claim_amount." to ".$request->claim_amount.". "  : "";
        $payeeModelOld = PayeeModel::find($claim->payee_name);
        $payeeModelNew = PayeeModel::find($request->payee_name);
        $payee_name = ($claim->payee_name != $request->payee_name && $payeeModelOld && $payeeModelNew)
            ? "Payee name has been changed from ".$payeeModelOld->name
            ." to ".$payeeModelNew->name.". "
            : "";
        // $payee_name = $claim->payee_name != $request->payee_name ? "Payee name has been changed from ".PayeeModel::find($claim->payee_name)->name." to ".PayeeModel::find($request->payee_name)->name.". " : "";
        $account_number = $claim->account_number != $request->account_number ? "Account number has been changed from ".$claim->account_number." to ".$request->account_number.". ": "";
        $submission_date = $claim->created_at->format("Y-m-d") != $request->created_at ? "Submission date has been changed from ".$claim->created_at->format("m/d/Y")." to ".date('m/d/Y',strtotime($request->created_at)).".": "";
        $description = $claim->user_details->name.' '.$claim->user_details->last_name."'s Bill#".$claim->id." has been updated with the following changing, ".$claim_amount.$payee_name.$account_number.$submission_date;
        $claim->claim_amount = $request->claim_amount;
        $claim->payee_name = $request->payee_name;
        $claim->account_number = $request->account_number;
        $claim->created_at->format("Y-m-d") != $request->created_at ? $claim->created_at = $request->created_at: "";
        $claim->created_at = $request->created_at;
        $claim->save();
        $claim_amount == "" && $payee_name == "" && $account_number == "" && $submission_date=="" ? "" : createLog('Bill',Session::get('loginId'), $claim->claim_user , $description);
        return response()->json(['type' => 'success', 'message' => 'Recurring Bill has been updated successfully','header'=>'success']);
    }
    public function store_edit_bill(Request $request){
        $this->validate($request,[
            // 'claim_user'=>'required',
            'claim_amount'=>'required|numeric',
            'claim_category'=>'required',
            'claim_bill_attachment'=>'mimes:jpg,jpeg,png,gif,pdf|max:6048',
            'recurring_day' => 'required_if:recurring_bill,1'
        ],[
            'recurring_day.required_if'=>'Please select billing cycle'
        ]);
        $claim = claim::find($request->id);
        $claim->recurring_day = $request->recurring_day;
        // $claim->claim_user = $request->claim_user;
        $claim->claim_amount = $request->claim_amount;
        $claim->claim_category = $request->claim_category;
        $claim->recurring_bill = $request->recurring_bill;
        $claim->payee_name = $request->payee_name;
        $claim->account_number = $request->account_number;
        if($request->claim_description){
            $claim->claim_description = $request->claim_description;
        }
        if(date('Y-m-d',strtotime($claim->created_at)) != $request->claim_date){
            $claim->created_at = $request->claim_date;
        }
        if($request->claim_bill_attachment){
            $attachment = rand().$request->claim_bill_attachment->getClientOriginalName();
            $request->claim_bill_attachment->move(public_path('/img'),$attachment);
            $claim->claim_bill_attachment = $attachment;
        }
        $claim->save();
        return response()->json(['header'=>'Bill Edited !','type'=>'success','message'=>" Your bill has been edited successfully."]);
    }
    
}
