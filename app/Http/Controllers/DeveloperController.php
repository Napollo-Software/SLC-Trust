<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Models\User;
use App\Models\Claim;
use App\Models\Documents;
use App\Imports\ImportPayees;
use App\Jobs\WelcomeEmailJob;
use Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class DeveloperController extends Controller
{
    public function welcomeEmail(Request $request)
    {
    //     $all_users = User::where('role','User')->where('email','Not Like','%@slc.org')->get();
    //     $ignore_emails = [
    //         'Rochelr2003@yahoo.com'
    //         // 'yaus345@gmail.com',
    //         // 'Debbie22271@aol.com',
    //         // 'eo63694@gmail.com',
    //         // 'hwieds@gmail.com',
    //         // 'irismstern@gmail.com',
    //         // 'tara@mylittlesunshinenyc.com',
    //         // 'wantaghfitz@gmail.com',
    //     ];
    //     foreach($all_users as $user){
    //        if(in_array($user->email, $ignore_emails)){
    //         $rand_token = Str::random(50);
    //         $token = User::find($user->id);
    //         $token->token = $rand_token;
    //         $token->save();
    //         WelcomeEmailJob::dispatch($user->email,null,$user->name.' '.$user->last_name,$user->email,$rand_token);
    //        }
    //         // continue;

    //         // \Mail::to($user->email)->send(new \App\Mail\WelcomeEmail(null,$user->name.' '.$user->last_name,null,$rand_token,));
    //    }

    //     dd($all_users);
    //     // $name='usama';
    //     // $url = 'fsa';
    //     // return view('emails.welcome-email',compact('name','url'));
    //     \Mail::to('usamafiaz915@gmail.com')->send(new \App\Mail\WelcomeEmail(null,null,null,null));
    //     dd('Emails sent successfully');
    }
    public function makeAcutualDocument()
    {
        createDocument(42);
        dd('success');
    }


    public function ImportPayee(Request $request)
    {
       return view('payees.import');
    }
    public function saveImportedPayee(Request $request)
    {
        Excel::import(new ImportPayees, $request->payees);
       dd($request->all());
    }

    function create_recurring_bills() {
        $claims = DB::table('claims')->get();
        foreach ($claims as $claim){
            $claim = Claim::find($claim->id);
            if($claim){
                $new_claim = $claim->replicate();
                $new_claim->claim_status = "Pending";
                $new_claim->partial_amount=null;
                $new_claim->recurring_bill=0;
                $new_claim->recurred=$claim->id;
                $new_claim->recurring_day=null;
                $new_claim->created_at = "2023-02-26";
                $new_claim->save();
            }
        }
        dd('Bills replicated successfully');
    }
    public function EmailDoc(){
        $name = 'Usama';
        $email_message = 'Please fill the following documents and share it on intrurpit@gmail.com';
        $url = 'www.mail.com';
        $all_documents = Documents::where('actual_document',1)->get();
        $selected_documents = [
            '1-Joinder Agreement.pdf',
            '2-DOH-960 Hipaa.pdf',
            '3-MAP-751e - Authorization to Release Medical Information.pdf',
            '4-DOH 5173-Hipaa State.pdf',
            '5- DOH -5139 Disability FILLABLE Questionnaire.pdf',
            '6-DOH-5143.pdf'
        ];
        $filtered_documents = $all_documents->filter(function ($document) use ($selected_documents){
            return in_array($document->name, $selected_documents);
        });
        // \Mail::to('usama.fiaz@napollo.net')->send(new \App\Mail\EmailDocuments($name,$email_message,$filtered_documents));
        return view('emails.email_documents', compact('name', 'email_message', 'filtered_documents'));
    }
   public function set_recurring_day(){
     Claim::where('recurring_bill',1)->each(function ($item){
        $item->update([
            'recurring_day' => $item->created_at->day,
        ]);
     });
     dd('success');
   }
}
