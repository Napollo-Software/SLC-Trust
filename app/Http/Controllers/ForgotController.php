<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use App\Models\Notifcation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ForgotController extends Controller
{
    public function sendEmail(){
        return view('forgotPassword.sendEmail');
    }
    public function usersendemail(Request $request){
        $user=User::where('email',$request->email)->first();
        if($user){
        $user->token=$request->_token;
        $details=$request->_token;
        $name=$user->name;
        $user->save();
          if($user){
            $notifcation=new Notifcation();
            $notifcation->user_id=$user->id;
            $notifcation->name=$user->name;
            $notifcation->description=" Please check your email account to reset password.";
            $notifcation->title='Password Reset';
            $notifcation->status = 0;
            //$notifcation->save();

            Mail::to($request->email)->send(new \App\Mail\ForgotPassword($details,$name));
            Alert::success('Congrats', 'You have requested to change your password,
            Soon, you will receive an email to reset your password on your registered email address');
        }
          else{
            Alert::error('Opps!', 'Sorry! Email not send');
        }

          }
           else{
        Alert::error('Opps!', 'Sorry! This Email is not Registered ');
        }

        return back();

    }
    public function forgotview($token){
        $token=User::where('token',$token)->first();
         return view('forgotPassword.resetpassword',compact('token'));
     }
      public function setPassword($token){
        $token=User::where('token',$token)->first();
        return view('forgotPassword.newsetpassword',compact('token'));
     }
     public function changepassworduser(Request $request){
        $user=User::where('email',$request->email)->first();
        if($request->password==$request->confirm_password){
            $user->password=Hash::make($request->password);
            $user->save();
            if($user){
                
        $bill_date=date('d-m-Y',strtotime($user->created_at));
        
        $uid= User::where('id', '=', Session::get('loginId'))->first();
        
        $notifcation=new Notifcation();
        $notifcation->user_id=$user->id;
        $notifcation->name=$user->name;
        $notifcation->description=" Your password has been generated on ".$bill_date." by ".$user->name.".";
        $notifcation->title='Password Generated';
        $notifcation->status = 0;
        //$notifcation->save();

        $details = [
            'title' => 'Mail from Intrustpit',
            'body' => ' Password Generated Succeussfully'
        ];
                 $user = User::find(Session::get('loginId'));
                \Mail::to($request->email)->send(new \App\Mail\PasswordGenerate($details));
                Alert::success('Congrats', 'Password Generated Succeussfully');
                return redirect()->route('login');
            }else{
                
               $bill_date=date('d-m-Y',strtotime($user->created_at));
        $user_id = User::where('id', '=', $claim->claim_user)->first();
        $uid= User::where('id', '=', Session::get('loginId'))->first();
        $notifcation=new Notifcation();
        $notifcation->user_id=$user->id;
        $notifcation->name=$user->name;
        $notifcation->description=" Your password not generated on ".$bill_date." by ".$user->name.".";
        $notifcation->title='Password Generated';
        $notifcation->status = 0;
        //$notifcation->save();

        $details = [
            'title' => 'Mail from Intrustpit',
            'body' => ' Password Not Generated'
        ];
        $user = User::find(Session::get('loginId'));
         \Mail::to($request->email)->send(new \App\Mail\PasswordGenerate($details));
                Alert::error('Opps!', 'Password Not generate');
                return back();
            }
        }
        else{
            Alert::error('Opps!', 'Password & Confirm Password Does not Match,So enter again password');
         return back();
        }
    }
}
