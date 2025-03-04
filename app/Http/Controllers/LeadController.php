<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Lead;
use App\Models\Type;
use App\Models\User;
use App\Models\contacts;
use App\Models\Followup;
use App\Models\Notifcation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Session\Session as SessionSession;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('vendor:id,name', 'contact:id,fname,lname')->get();
        return view('leads.index', compact('leads'));
    }


    public function view($id)
    {
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        $contacts = contacts::select('id', 'fname', 'lname')->get();
        $lead = Lead::with('followups')->find($id);

        $assignee = User::whereHas('roles', function ($query) {
            $query->where('role', 'employee');
        })->get();

        if ($lead) {
            return view('leads.view', compact('lead', 'vendors', 'contacts' , 'assignee'));
        } else {
            alert('error', 'Lead not found');
            return redirect('/leads');
        }
    }


    public function create()
    {
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        // $assignees = User::select('id', 'name')
        //     ->whereDoesntHave('roles', function ($query) {
        //         $query->whereIn('name', ['vendor', 'user']);
        //     })
        //     ->get();
        $assignees = User::where('role','Employee')->get();
        $contacts = contacts::select('id', 'fname', 'lname')->get();
        return view('leads.create', compact('vendors', 'contacts','assignees'));
    }

    public function store(Request $request)
    {
        $converted_to_referral = "";
        if($request->convert_to_referral == 1){
            $converted_to_referral = 1;
        }
        $request->validate([
            'contact_first_name' => 'required|max:250',
            'contact_last_name' => 'required|max:250',
            'contact_phone' => 'required',
            'contact_email' => 'required|email|',
            'language'=> 'nullable|max:250',
            'relationship' => 'nullable',
            'patient_first_name' => 'required|max:250',
            'patient_last_name' => 'required|max:250',
            'patient_phone' => 'required',
            'patient_email' => 'required|email',
            'interested' => 'nullable|max:250',
            'sub_status' => 'required',
            'assign_to' => 'required',
            'case_type_id' =>  'required',
            'note' => 'nullable|max:250',
            'source_type' => 'required',
            'contact' => $request->input('source_type') === 'contact' ? 'required' : 'nullable',
            'account' => $request->input('source_type') === 'account' ? 'required' : 'nullable',
            'source' => $request->input('source_type') === 'FnF' ? 'required' : 'nullable',
            'other_case'=>Rule::requiredIf($request->case_type_id == 'other'),
        ]);

        if ($request->case_type_id === "other") {
            $type = Type::create([
                'category' => 'Case Type',
                'name' => $request->other_case,
            ]);
            $newTypeId = $type->id;
        }
        else {
            $newTypeId = $request->case_type_id;
        }

        $sourceType = $request->input('source_type');

        $lead = Lead::create([
            'contact_first_name' => $request->contact_first_name,
            'contact_last_name' => $request->contact_last_name,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'relation_to_patient' => $request->relationship,
            'language'=> $request->language,
            'patient_first_name' => $request->patient_first_name,
            'patient_last_name' => $request->patient_last_name,
            'patient_phone' => $request->patient_phone,
            'patient_email' => $request->patient_email,
            'interested_in' => $request->interested,
            'sub_status' => $request->sub_status,
            'vendor_id' => $request->assign_to,
            'case_type_id' => $newTypeId,
            'note' => $request->note,
            'source_type' => $request->source_type,
            'source' => ($sourceType === 'contact' ? $request->contact : ($sourceType === 'account' ? $request->account : ($sourceType === 'FnF' ? $request->source : null))),
            'converted_to_referral' => $converted_to_referral
        ]);

        Notifcation::create([
            'user_id' => $request->assign_to,
            'name' => $lead->full_name(),
            'description' => 'The lead ' . $lead->full_name() . ' has been assigned to you.',
            'title' => 'New Lead Assigned',
            'status' => 0,
        ]);

        return response()->json([
            'message' => 'Lead created successfully',
            'lead_id' => $lead->id,
        ]);
    }

    public function edit($id)
    {
        $sourceContact=[];
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        $contacts = contacts::select('id', 'fname', 'lname')->get();

        $lead = Lead::find($id);

        $assignees = User::where('role', 'Employee')->select('id', 'name')->get();

        if ($lead) {
            return view('leads.update', compact('lead', 'vendors', 'contacts','assignees','sourceContact'));
        } else {
            alert('error', 'Lead not found');
            return redirect('/leads');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'contact_first_name' => 'required|max:250',
            'contact_last_name' => 'required|max:250',
            'contact_phone' => 'required',
            'contact_email' => 'required|email',
            'relationship' => 'nullable',
            'language'=> 'nullable|max:250',
            'patient_first_name' => 'nullable|max:250',
            'patient_last_name' => 'nullable|max:250',
            'patient_phone' => 'required',
            'patient_email' => 'required|email',
            'interested' => 'nullable|max:250',
            'sub_status' => 'required',
            'assign_to' => 'required',
            'case_type_id' =>  'required',
            'note' => 'nullable|max:250',
            'source_type' => 'required',
            'closing_reason' => 'nullable|max:500',
            'contact' => $request->input('source_type') == 'contact' ? 'required' : 'nullable',
            'account' => $request->input('source_type') == 'account' ? 'required' : 'nullable',
            'source' => $request->input('source_type') == 'FnF' ? 'required' : 'nullable',
            'other_case'=>Rule::requiredIf($request->case_type_id == 'other'),
        ]);

        $lead = Lead::findOrFail($id);

        if ($request->case_type_id === "other") {
            $type = Type::create([
                'category' => 'Case Type',
                'name' => $request->other_case,
            ]);
            $newTypeId = $type->id;
        }
        else {
            $newTypeId = $request->case_type_id;
        }

        $sourceType = $request->input('source_type');

        $lead->update([
            'contact_first_name' => $request->contact_first_name,
            'contact_last_name' => $request->contact_last_name,
            'contact_phone' => $request->contact_phone,
            'contact_email' => $request->contact_email,
            'relation_to_patient' => $request->relationship,
            'language'=> $request->language,
            'patient_first_name' => $request->patient_first_name,
            'patient_last_name' => $request->patient_last_name,
            'patient_phone' => $request->patient_phone,
            'patient_email' => $request->patient_email,
            'interested_in' => $request->interested,
            'sub_status' => $request->sub_status,
            'vendor_id' => $request->assign_to,
            'case_type_id' => $newTypeId,
            'note' => $request->note,
            'source_type' => $request->source_type,
            'closing_reason' => $request->closing_reason,
            //'source_id' => $request->contact,
            'source' => ($sourceType === 'contact' ? $request->contact : ($sourceType === 'account' ? $request->account : ($sourceType === 'FnF' ? $request->source : null))),

        ]);
    }

}
