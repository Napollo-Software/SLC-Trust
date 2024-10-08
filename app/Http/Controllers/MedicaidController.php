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
        $referral_name = Referral::get();
        return view('medicaid.index', compact('medicaid', 'referral_name'));
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
            'medicaidNumber' => 'nullable|string',
            'type' => 'nullable|string',
            'medicaidPlan' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'activeMedicaid' => 'nullable|string',
            'code' => 'nullable|string',
        ]);

        $inputId = $request->inputId;

        if ($inputId) {
            $medicaid = Medicaid::findOrFail($inputId);
        } else {
            $medicaid = new Medicaid();
        }
        $medicaid->referral_name = $request->referral_id;
        $medicaid->medicaid_number = $request->medicaidNumber;
        $medicaid->type = $request->type;
        $medicaid->medicaid_plan = $request->medicaidPlan;
        $medicaid->phone_number = $request->phone_number;
        $medicaid->active_medicaid = $request->activeMedicaid;
        $medicaid->code = $request->code;
        $medicaid->save();

        if ($inputId) {
            return response()->json(['message' => 'Medicaid information updated successfully']);
        } else {
            return response()->json(['message' => 'New Medicaid information created successfully']);
        }
    }

    public function updateBankInfo(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'account_type' => 'required|string',
            'bank_name' => 'required|string',
            'routing_aba' => 'required|string',
            'billing_cycle' => 'required|string',
            'surplus_amount' => 'required|numeric|lt:10000|gt:0',
            'account_number' => 'required|string',
        ]);

        $referral = Referral::findOrFail($request->id);

        $referral->bankAccount()->updateOrCreate(
            ['referral_id' => $referral->id],
            [
                'account_type' => $request->account_type,
                'bank_name' => $request->bank_name,
                'routing_aba' => $request->routing_aba,
                'account_number' => $request->account_number,
                'billing_cycle' => $request->billing_cycle,
                'surplus_amount' => $request->surplus_amount,
            ]
        );

        return response()->json(['message' => 'Bank information updated successfully']);
    }


}
