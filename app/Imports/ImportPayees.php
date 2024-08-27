<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\PayeeModel;

class ImportPayees implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach($collection as $k=>$data){
            if($k>0){
                $payees = new PayeeModel;
                $payees->name = $data['0'];
                $payees->address1 = $data['1'];
                $payees->address2 = $data['2'];
                $payees->city = $data['3'];
                $payees->state = $data['4'];
                $payees->zip_code = $data['5'];
                $payees->save();
            }
        }
    }
}
