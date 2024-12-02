<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Lead;
use App\Models\User;
use App\Models\Followup;
use App\Models\Type;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;

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
        $lead = Lead::find($id);
        if ($lead) {
            return view('leads.view', compact('lead', 'vendors', 'contacts'));
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
        $new_type = 0;
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
            'case_type' => 'required|max:250',
            'note' => 'nullable|max:250',
            'source_type' => 'required',
            'contact' => $request->input('source_type') === 'contact' ? 'required' : 'nullable',
            'account' => $request->input('source_type') === 'account' ? 'required' : 'nullable',
            'source' => $request->input('source_type') === 'FnF' ? 'required' : 'nullable',
            // 'follow_up_date' => 'required',
            // 'follow_up_time' => 'required',
            // 'follow_up_note' => 'nullable|max:1000',
            'other_case'=>Rule::requiredIf($request->case_type === 'other'),
        ]);
        $newTypeId = null;
        if ($request->case_type === "other") {
            $type = Type::create([
                'category' => 'Case Type',
                'name' => $request->other_case,
            ]);
            $newTypeId = $type->id;
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
            'case_type' => $request->case_type === 'other' ? null : $request->case_type,
            'case_type_id' => $newTypeId,
            'note' => $request->note,
            'source_type' => $request->source_type,
            'source' => ($sourceType === 'contact' ? $request->contact : ($sourceType === 'account' ? $request->account : ($sourceType === 'FnF' ? $request->source : null))),
            'converted_to_referral' => $converted_to_referral
        ]);

        // $follow_up = new Followup();
        // $follow_up->leadId = $leadId;
        // $follow_up->from = Session::get('loginId');
        // $follow_up->to = $lead->id;
        // $follow_up->date = $request->follow_up_date;
        // $follow_up->time = $request->follow_up_time;
        // $follow_up->note = $request->follow_up_note;
        // $follow_up->save();
        return response()->json($lead->id);
    }

    public function edit($id)
    {
        $sourceContact=[];
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        $contacts = contacts::select('id', 'fname', 'lname')->get();

        $lead = Lead::find($id);

        $assignees = User::select('id', 'name')
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['vendor', 'user']);
            })
            ->get();

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
            'case_type' => 'required',
            'note' => 'nullable|max:250',
            'source_type' => 'required',
            'contact' => $request->input('source_type') === 'contact' ? 'required' : 'nullable',
            'account' => $request->input('source_type') === 'account' ? 'required' : 'nullable',
            'source' => $request->input('source_type') === 'FnF' ? 'required' : 'nullable',

        ]);

        $lead = Lead::find($id);
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
            'case_type' => $request->case_type,
            'note' => $request->note,
            'source_type' => $request->source_type,
            //'source_id' => $request->contact,
            'source' => ($sourceType === 'contact' ? $request->contact : ($sourceType === 'account' ? $request->account : ($sourceType === 'FnF' ? $request->source : null))),

        ]);


    }

}
