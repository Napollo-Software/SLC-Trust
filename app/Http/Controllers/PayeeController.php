<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PayeeModel;

class PayeeController extends Controller
{
    public function index()
    {
        $payees = PayeeModel::all();
        return view('payees.index',compact('payees'));
    }

    public function store(Request $request)
    {
        $data = new PayeeModel();
        $data->name = $request->name;
        $data->address1 = $request->address1;
        $data->address2 = $request->address2;
        $data->city = $request->city;
        $data->state = $request->state;
        $data->zip_code = $request->zip_code;
        $data->save();
        return response()->json(['sucess'=>'Payee has been stored successfully']);
    }
}
