<?php

namespace App\Exports;

use App\Models\Claim;
use App\Models\User;
use Session;
use Maatwebsite\Excel\Concerns\FromCollection;

class userbills implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            

           return Claim::orderBy('id', 'desc')->where('claim_user' , Session::get('loginId'))->get();

            
    }
}
