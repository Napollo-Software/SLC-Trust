<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;
class UserTransaction implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
        return Transaction::orderBy('id', 'desc')->where('user_id' , Session::get('loginId'))->get();
    }
}
