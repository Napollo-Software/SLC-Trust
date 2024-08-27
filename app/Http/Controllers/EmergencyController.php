<?php

namespace App\Http\Controllers;

use App\Models\EmergencyContacts;
use Dotenv\Validator;
use Illuminate\Http\Request;

class EmergencyController extends Controller
{
    public function index(Request $request)
    {
        $data = EmergencyContacts::where('referral_id', $request->id)->get();
        return view('referral.emergency', compact('data',));
    }
   
public function emergencyEdit(Request $request) {
    $this->validate($request, [
        'emergency_first_name' => 'required|string|max:255',
        'emergency_last_name' => 'required|string|max:255',
        'emergency_ext' => 'nullable|string|max:20',
        'emergency_phone' => 'nullable|string|max:20',
        'emergency_state' => 'nullable|string|max:255',
        'emergency_email' => 'nullable|email|max:255',
        'emegency_relationship' => [
            'nullable',
            'string',
        ],
        'emergency_city' => 'nullable|string|max:255',
        'emergency_zip' => 'nullable|string|max:20',
        'emergency_apt' => 'nullable|string|max:255',
        'have_keys' => 'nullable|boolean',
        'address_of_emergency' => 'nullable|string|max:255',
    ]);

    $contact=EmergencyContacts::where('id', $request->id)->update([
        'emergency_first_name' => $request->emergency_first_name,
        'emergency_last_name' => $request->emergency_last_name,
        'emergency_ext_number' => $request->emergency_ext,
        'emergency_phone_number' => $request->emergency_phone,
        'emergency_state' => $request->emergency_state,
        'emergency_email' => $request->emergency_email,
        'emergency_relationship' => $request->emegency_relationship,
        'emergency_city' => $request->emergency_city,
        'emergency_zip_code' => $request->emergency_zip,
        'emergency_apt_suite' => $request->emergency_apt, 
        'have_keys' => $request->have_keys,
        'live_with_parents' => $request->have_keys,
        'emergency_address' => $request->address_of_emergency,
    ]);

    
    

    return response()->json(['message' => 'Emergency contact updated successfully']);
}
    
}
