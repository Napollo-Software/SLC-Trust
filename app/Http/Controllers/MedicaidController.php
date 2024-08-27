<?php

namespace App\Http\Controllers;

use App\Models\Medicaid;
use App\Models\Physician;
use App\Models\Referral;
use Illuminate\Http\Request;

class MedicaidController extends Controller
{
    public function index()
    {
        $medicaid = Medicaid::all();
        $referral_name= Referral::get();
        return view('medicaid.index',compact('medicaid' ,'referral_name'));
    }
    public function store(Request $request)
    {
        $physician = new Physician();
        $physician->physician_name = $request->physician_name;
        $physician->referral_name = $request->referral_name;
        $physician->practice_name = $request->name_of_practice;
        $physician->fax = $request->fax;
        $physician->phone = $request->phone;
        $physician->ext = $request->ext;
        $physician->email = $request->email;
        $physician->npi = $request->npi;
        $physician->physician_address = $request->address;
        $physician->save();
        
        
        $data = new medicaid();
        $data->medicaid_number = $physician->id;
        $data->referral_name = $physician->referral_name;
        $data->code = $request->code;
        $data->active_medicaid = $request->active;
        $data->medicaid_plan = $request->plan;
        $data->type = $request->medicare_type;
        $data->phone_number = $request->medicare_number;
        $data->save();


        return response()->json(['success' => 'Payee has been stored successfully']);
    }
    public function updatePhysician(Request $request)
    {
        $request->validate([
            'userName' => 'required|string',
            'practiceName' => 'required|string',
            'phone' => 'required|string',
            'extNumber' => 'required|string',
            'email' => 'required|string|email',
            'address' => 'required|string',
            'fax' => 'required|string',
        ]);
    
        $userId = $request->input('userId');
        
        if ($userId) {
            $physician = Physician::findOrFail($userId);
        } else {
            $physician = new Physician();
        }
        $physician->referral_name = $request->referral_id;
        $physician->physician_name = $request->input('userName');
        $physician->practice_name = $request->input('practiceName');
        $physician->phone = $request->input('phone');
        $physician->ext = $request->input('extNumber');
        $physician->email = $request->input('email');
        $physician->physician_address = $request->input('address');
        $physician->fax = $request->input('fax');
        $physician->save();
    
        if ($userId) {
            return response()->json(['message' => 'Physician information updated successfully']);
        } else {
            return response()->json(['message' => 'New physician information created successfully']);
        }
    }
    
    public function updateMedicaid(Request $request)
    {
        $request->validate([
            'medicaidNumber' => 'required|string',
            'type' => 'required|string',
            'medicaidPlan' => 'required|string',
            'phone_number' => 'required|string',
            'activeMedicaid' => 'required|string',
            'code' => 'required|string',
        ]);
    
        $inputId = $request->input('inputId');
    
        if ($inputId) {
            $medicaid = Medicaid::findOrFail($inputId);
        } else {
            $medicaid = new Medicaid();
        }
        $medicaid->referral_name = $request->referral_id;
        $medicaid->medicaid_number = $request->input('medicaidNumber');
        $medicaid->type = $request->input('type');
        $medicaid->medicaid_plan = $request->input('medicaidPlan');
        $medicaid->phone_number = $request->input('phone_number');
        $medicaid->active_medicaid = $request->input('activeMedicaid');
        $medicaid->code = $request->input('code');
        $medicaid->save();
    
        if ($inputId) {
            return response()->json(['message' => 'Medicaid information updated successfully']);
        } else {
            return response()->json(['message' => 'New Medicaid information created successfully']);
        }
    }
    
}
