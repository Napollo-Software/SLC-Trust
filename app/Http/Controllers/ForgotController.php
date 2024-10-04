<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ForgotController extends Controller
{
    public function sendEmail()
    {
        return view('forgotPassword.sendEmail');
    }
    public function usersendemail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->token = $request->_token;
            $details = $request->_token;
            $name = $user->name;
            $user->save();
            if ($user) {
                $notifcation = new Notifcation();
                $notifcation->user_id = $user->id;
                $notifcation->name = $user->name;
                $notifcation->description = " Please check your email account to reset password.";
                $notifcation->title = 'Password Reset';
                $notifcation->status = 0;
                //$notifcation->save();

                Mail::to($request->email)->send(new \App\Mail\ForgotPassword($details, $name));
                Alert::success('Congrats', 'You have requested to change your password,
            Soon, you will receive an email to reset your password on your registered email address');
            } else {
                Alert::error('Opps!', 'Sorry! Email not send');
            }

        } else {
            Alert::error('Opps!', 'Sorry! This Email is not Registered ');
        }

        return back();

    }
    public function forgotview($token)
    {
        $token = User::where('token', $token)->first();
        return view('forgotPassword.resetpassword', compact('token'));
    }
    public function setPassword($token)
    {
        $token = User::where('token', $token)->first();
        return view('forgotPassword.newsetpassword', compact('token'));
    }
    public function changepassworduser(Request $request)
    {
        $request->validate(["password" => "required|min:5"]);

        $user = User::where('email', $request->email)->first();
        
        $app_name = config('app.professional_name');
        if ($request->password == $request->confirm_password) {
            $user->password = Hash::make($request->password);
            $user->save();
            if ($user) {

                $bill_date = date('d-m-Y', strtotime($user->created_at));

                User::where('id', '=', Session::get('loginId'))->first();

                $notifcation = new Notifcation();
                $notifcation->user_id = $user->id;
                $notifcation->name = $user->name;
                $notifcation->description = " Your password has been generated on " . $bill_date . " by " . $user->name . ".";
                $notifcation->title = 'Password Generated';
                $notifcation->status = 0;
                //$notifcation->save();

                $details = [
                    'title' => 'Mail from '.$app_name,
                    'body' => ' Password Generated Succeussfully'
                ];
                $user = User::find(Session::get('loginId'));
                Mail::to($request->email)->send(new \App\Mail\PasswordGenerate($details));
                Alert::success('Congrats', 'Password Generated Succeussfully');
                return redirect()->route('login');
            } else {

                $bill_date = date('d-m-Y', strtotime($user->created_at));
                User::where('id', '=', $claim->claim_user)->first();
                User::where('id', '=', Session::get('loginId'))->first();
                $notifcation = new Notifcation();
                $notifcation->user_id = $user->id;
                $notifcation->name = $user->name;
                $notifcation->description = " Your password not generated on {$bill_date} by {$user->name}.";
                $notifcation->title = 'Password Generated';
                $notifcation->status = 0;
                //$notifcation->save();

                $details = [
                    'title' => 'Mail from '.$app_name,
                    'body' => ' Password Not Generated'
                ];
                $user = User::find(Session::get('loginId'));
                Mail::to($request->email)->send(new \App\Mail\PasswordGenerate($details));
                Alert::error('Opps!', 'Password Not generate');
                return back();
            }
        } else {
            Alert::error('Opps!', 'Password & Confirm Password Does not Match,So enter again password');
            return back();
        }
    }
}
