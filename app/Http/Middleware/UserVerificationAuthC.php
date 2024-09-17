<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserVerificationAuthC
{
    public function handle(Request $request, Closure $next)
    {
        $account_status = User::where('email', $request->email)->value('account_status');

        if ($account_status == 'Suspended') {
            return redirect('/')->with('fail', 'Your account is suspended!');
        }

        if ($account_status == 'Pending') {
            return redirect('/')->with('fail', 'Your account is under review!');
        }

        if ($account_status == 'Not Approved') {
            return redirect('/')->with('fail', 'Your account is not verified!');
        }

        if ($account_status == 'Disable') {
            return redirect('/')->with('fail', 'Your account is deactivated by '.\Company::Account_name);
        }
        
        return $next($request);
    }
}
