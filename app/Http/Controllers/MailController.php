<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function index(){
        $message='Message';
        $subject='Subject';
        $to='usama.fiaz@napollo.net';

        try{
            Mail::html( $message, function( $message ) use ($subject,$to) {
                $message->subject( $subject )->to( $to );
            });
            return 'sent';
        }catch (\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }
}
