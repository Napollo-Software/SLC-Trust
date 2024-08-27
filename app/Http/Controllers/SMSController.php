<?php

namespace App\Http\Controllers;

use App\Models\Referral;
use App\Models\smsChat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SMSController extends Controller
{
    public function index()
    {
        $userId = Session::get("loginId");
        $user = User::where("id", $userId)->get();
        $referral = Referral::all();
        $message = smsChat::orderBy('created_at', 'desc')->get();
        return view("sms.index", compact("referral", "user", "message"));
    }
    public function details(Request $request)
    {
        $id = $request->input("id");
        $messages = smsChat::where('to', $id)->get();
        $referral = Referral::where('id', $id)->first();
        return response()->json(['html' => view('sms.chat', compact('messages', 'referral',))->render(), 'id' => $id]);
    }


    public function sendMessage(Request $request)
    {
        $userId = Session::get("loginId");
        $chat = new smsChat();
        $chat->to = $request->input('chatTo');
        $chat->message = $request->input('message');
        $chat->from = $userId;
        $chat->save();
        $latestChat = smsChat::where('id', $chat->id)->first();

        return response()->json(['message' => 'SMS sent successfully', 'latestChat' => $latestChat]);
    }
}
