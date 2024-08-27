<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use Session;

class UserVerificationAuthC
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $account_status = User::where('email', '=', $request->email)->value('account_status');
        //dd($account_status);
        if ($account_status == 'Pending') {
            return redirect('/')->with('fail', 'Your account is under review!');
        }
        if ($account_status == 'Not Approved') {
            return redirect('/')->with('fail', 'Your account is not verified!');
        }
        if ($account_status == 'Disable') {
            return redirect('/')->with('fail', 'Your account is deactivated by Intrustpit!');
        }
        return $next($request);
    }
}
