<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Claim;
use App\Models\User;
use Session;
class deletebills implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       $role = User::where('id', '=', Session::get('loginId'))->value('role');

            if ($role == 'Admin'){
             
             return Claim::orderBy('id', 'desc')->onlyTrashed()->get();

            }else if ($role == 'User'){

           return Claim::orderBy('id', 'desc')->where('claim_user' , Session::get('loginId'))->onlyTrashed()->get();

            }
    }
}
