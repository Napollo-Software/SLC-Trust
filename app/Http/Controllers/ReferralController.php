<?php

namespace App\Http\Controllers;
use Hash;
use App\Models\Lead;
use App\Models\Type;
use App\Models\User;
use App\Mail\Register;
use App\Models\contacts;
use App\Models\Medicaid;
use App\Models\Referral;
use App\Models\CheckList;
use App\Models\Documents;
use Illuminate\Http\Request;
use App\Models\DocumentESign;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\EmergencyContacts;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferralConvertToCustomer;
use Illuminate\Support\Facades\Session;


class ReferralController extends Controller
{
    public function index(Request $request)
    {
        $data = Referral::orderBy('id', 'desc')->get();
        return view('referral.index', compact('data'));
    }
    public function updateDoc(Request $request, $id)
    {
        $userId = Session::get("loginId");

        $document = Referral::findOrFail($id);
        $document->approved = $userId;
        $document->status = $request->status;
        $document->save();
        return response()->json(['message' => 'Status updated successfully']);
    }

    public function create($lead_id = null)
    {
        if($lead_id)
        {
            $lead = Lead::findOrFail($lead_id);
            $lead->converted_to_referral = 1;
            $lead->save();
        }
        else{
            $lead = Lead::latest('id')->first();
        }
        $typeData = Type::where('category', 'Case Type')->get();
        $referal = Referral::get();
        $contacts = contacts::select('id', 'fname', 'lname')->get();
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        $intakeCordinator = User::where('role', 'Admin')->get();
        return view('referral.create', compact('typeData', 'intakeCordinator', 'referal', 'contacts', 'vendors', 'lead'));
    }

    public function store(Request $request)
    {
        $userId = Session::get("loginId");

        $request->validate([
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'age' => 'nullable|integer',
            'phone' => 'required|string',
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    $emailExistsInReferrals = Referral::where('email', $value)->exists();
                    $emailExistsInUsers = User::where('email', $value)->exists();

                    if ($emailExistsInReferrals) {
                        $fail("The $attribute has already been taken in referrals.");
                    } elseif ($emailExistsInUsers) {
                        $fail("The $attribute has already been taken in users.");
                    }
                }
            ],
            'date_of_birth' => 'nullable|date',
            'country' => 'nullable|max:250',
            'county' => 'nullable|max:250',
            'city' => 'nullable|string|max:250',
            'state' => 'nullable|string',
            'address' => 'nullable|string|max:250',
            'ssn' => 'nullable|string|max:250',
            'patient_language' => 'nullable|string|max:250',
            'zip' => 'nullable|string|max:250',
            'medicaid_phone' => 'nullable|string',
            'medicaid_plan' => 'nullable|string',
            'medicare_phone' => 'nullable|string',
            'emergency_first_name' => 'required|string|max:250',
            'emergency_last_name' => 'required|string|max:250',
            'emergency_ext' => 'nullable|numeric|digits_between:2,10',
            'emergency_state' => 'nullable|string',
            'emergency_email' => 'required|email',
            'emegency_relationship' => 'nullable|string',
            'emergency_phone' => 'nullable|string',
            'emergency_city' => 'nullable|string|max:250',
            'emergency_zip' => 'nullable|numeric',
            'emergency_address' => 'nullable|string|max:250',
            'source_type' => 'nullable',
            'contact' => $request->input('source_type') === 'contact' ? 'required' : 'nullable',
            'account' => $request->input('source_type') === 'account' ? 'required' : 'nullable',
            'source' => $request->input('source_type') === 'FnF' ? 'required' : 'nullable',
            'admission_date' => 'nullable|date',
        ]);

        $referral = Referral::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'status' => 'Pending',
            'email_status' => 'Pending',
            'phone_number' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'country' => $request->country,
            'city' => $request->city,
            'county' => $request->county,
            'state' => $request->state,
            'address' => $request->address,
            'zip_code' => $request->zip,
            'apt_suite' => $request->apt,
            'patient_ssn' => $request->ssn,
            'patient_language' => $request->patient_language,
            'medicaid_number' => $request->medicaid_phone,
            'medicaid_plan' => $request->medicaid_plan,
            'medicare_number' => $request->medicare_phone,
            'source_type' => $request->source_type,
            'source' => ($request->source_type === 'contact' ? $request->contact : ($request->source_type === 'account' ? $request->account : ($request->source_type === 'FnF' ? $request->source : null))),
            'admission_date' => $request->admission_date,
            'intake' => $request->intake,
            'marketer' => $request->marketer,
            'case_type' => $request->type,
            'created_by' => $userId,
        ]);

        $ref_id = $referral->id;

        createDocument($ref_id);

        EmergencyContacts::create([
            'referral_id' => $referral->id,
            'emergency_relationship' => $request->emegency_relationship,
            'emergency_first_name' => $request->emergency_first_name,
            'emergency_last_name' => $request->emergency_last_name,
            'emergency_phone_number' => $request->emergency_phone,
            'emergency_address' => $request->emergency_address,
            'emergency_ext_number' => $request->emergency_ext,
            'emergency_apt_suite' => $request->emergency_apt,
            'emergency_zip_code' => $request->emergency_zip,
            'emergency_state' => $request->emergency_state,
            'emergency_email' => $request->emergency_email,
            'emergency_city' => $request->emergency_city,
            'live_with_parents' => $request->have_keys,
            'have_keys' => $request->have_keys,
        ]);

        CheckList::create([
            'referral_id' => $ref_id,
            'hipaa_state' => $request->document_checkboxes3,
            'disability' => $request->document_checkboxes1,
            'joinder' => $request->document_checkboxes5,
            'source' => $request->document_checkboxes9,
            'tform' => $request->document_checkboxes10,
            'hipaa' => $request->document_checkboxes4,
            'mltc' => $request->document_checkboxes8,
            'home' => $request->document_checkboxes7,
            'doh' => $request->document_checkboxes2,
            'map' => $request->document_checkboxes6,
        ]);

        Medicaid::create([
            'referral_name' => $ref_id,
            'medicaid_number' => $request->medicaid_phone,
            'type' => $request->type,
            'phone_number' => $request->phone,
            'active_medicaid' => $request->activeMedicaid,
            'code' => $request->zip,
        ]);

        return response()->json(['success' => 'Referral has been stored successfully']);
    }
    public function edit($id)
    {
        $typeData = Type::where('category', 'Case Type')->get();
        $Referral = Referral::with(['accounts_source:id,name', 'contact_source:id,fname,lname', 'bankAccount'])->find($id);
        $contacts = contacts::select('id', 'fname', 'lname')->get();
        $checklistData = CheckList::where('referral_id', $id)->first();
        $vendors = User::select('id', 'name')->whereHas('roles', function ($query) {
            $query->where('name', 'vendor');
        })->get();
        $doh = $checklistData->doh;
        $disability = $checklistData->disability;
        $hippa = $checklistData->hippa;
        $hippa_state = $checklistData->hippa_state;
        $joinder = $checklistData->joinder;
        $map = $checklistData->map;
        $home = $checklistData->home;
        $mltc = $checklistData->mltc;
        $source = $checklistData->source;
        $tform = $checklistData->tform;
        $checks = $Referral->refferals_check;

        $intakeCordinator = User::where('role', 'Admin')->get();

        return view('referral.update', compact('typeData', 'intakeCordinator', 'Referral', 'checks', 'contacts', 'vendors'));
    }
    public function view($id)
    {
        $actualDocuments = Documents::where('actual_document', 1)->get();
        $referralDocuments = Documents::where('referral_id', $id)->get();
        $pendingDocumentCount = 0;
        $recievedDocumentCount = 0;

        foreach ($referralDocuments as $document) {
            $status = $document->status;
            if (in_array($status, ['pending', 'doc sent', 'Rejected'])) {
                $pendingDocumentCount++;
            } elseif (in_array($status, ['Approved', 'Recieved'])) {
                $recievedDocumentCount++;
            }
        }

        $docs = DocumentESign::all();
        $document = DocumentESign::all();
        $lead = Lead::all();
        $referral = Referral::find($id);

        $emergencyDetails = EmergencyContacts::where('referral_id', $id)->get();
        $checks = $referral->refferals_check;
        $fromFollowup = User::find($referral->get_followup->first()) !== null ? User::find($referral->get_followup->first()->from) : null;
        $esignTrust = $referral->trustEsign;
        $documentTrust = $referral->trustDocument;
        $financeTrust = $referral->trustFinance;
        $checkListTrust = $referral->trustCheckList;
        $totalTrust = $esignTrust + $documentTrust + $financeTrust + $checkListTrust;

        return view('referral.view', compact('pendingDocumentCount', 'recievedDocumentCount', 'totalTrust', 'fromFollowup', 'referral', 'referralDocuments', 'actualDocuments', 'document', 'checks', 'emergencyDetails'));
    }

    public function update(Request $request)
    {
        $userId = Session::get("loginId");
        $request->validate([
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'gender' => 'required|string|max:250',
            'age' => 'nullable|integer',
            'phone_number' => 'required|string',
            'email' => 'required|email',
            'date_of_birth' => 'nullable|date',
            'country' => 'nullable|max:250',
            'city' => 'nullable|string|max:250',
            'county' => 'nullable|string|max:250',
            'state' => 'nullable|string',
            'address' => 'nullable|string|max:250',
            'ssn' => 'nullable|string|max:250',
            'patient_language' => 'nullable|string|max:250',
            'zip' => 'nullable|string|max:250',
            'apt_suite' => 'nullable|string|max:250',
            'medicaid_phone' => 'nullable|string',
            'medicaid_plan' => 'nullable|string',
            'medicare_phone' => 'nullable|string',
            'emergency_first_name' => 'string|max:250',
            'emergency_last_name' => 'string|max:250',
            'emergency_ext' => 'numeric',
            'emergency_state' => 'string',
            'emergency_email' => 'email',
            'emegency_relationship' => 'string',
            'emergency_phone' => 'string',
            'emergency_city' => 'string|max:250',
            'emergency_zip' => 'numeric',
            'emergency_address' => 'string|max:250',
            'source_type' => 'required',
            'contact' => $request->input('source_type') === 'contact' ? 'nullable' : 'nullable',
            'account' => $request->input('source_type') === 'account' ? 'nullable' : 'nullable',
            'source' => $request->input('source_type') === 'FnF' ? 'required' : 'nullable',
            'admission_date' => 'nullable|date',

        ]);

        $referral = Referral::find($request->id);
        $sourceType = $request->input('source_type');

        if (!$referral) {
            return response()->json(['message' => 'Referral not found'], 404);
        }


        $referral->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'city' => $request->city,
            'county' => $request->county,
            'state' => $request->state,
            'address' => $request->address,
            'zip_code' => $request->zip,
            'apt_suite' => $request->apt_suite,
            'patient_ssn' => $request->ssn,
            'patient_language' => $request->patient_language,
            'medicaid_plan' => $request->medicaid_plan,
            'source_type' => $request->source_type,
            'source' => ($sourceType === 'contact' ? $request->contact : ($sourceType === 'account' ? $request->account : ($sourceType === 'FnF' ? $request->source : null))),
            'admission_date' => $request->admission_date,
            'medicaid_number' => $request->medicaid_phone,
            'medicare_number' => $request->medicare_phone,
            'intake' => $request->intake,
            'marketer' => $request->marketer,
            'case_type' => $request->type,
            'created_by' => $userId,
        ]);





        $checklist = CheckList::firstOrNew(["referral_id" => $request->id]);

        $checklist->fill([
            'disability' => $request->has('document_checkboxes1') ? 1 : 0,
            'doh' => $request->has('document_checkboxes2') ? 1 : 0,
            'hipaa_state' => $request->has('document_checkboxes3') ? 1 : 0,
            'hipaa' => $request->has('document_checkboxes4') ? 1 : 0,
            'joinder' => $request->has('document_checkboxes5') ? 1 : 0,
            'map' => $request->has('document_checkboxes6') ? 1 : 0,
            'home' => $request->has('document_checkboxes7') ? 1 : 0,
            'mltc' => $request->has('document_checkboxes8') ? 1 : 0,
            'source' => $request->has('document_checkboxes9') ? 1 : 0,
            'tform' => $request->has('document_checkboxes10') ? 1 : 0,
        ])->save();

        return response()->json(['message' => 'Referral updated successfully']);
    }
    public function updateCheckList(Request $request)
    {
        $checklist = Checklist::firstOrNew(["referral_id" => $request->referral_id]);

        $checkboxes = [
            'document_checkboxes1' => 'disability',
            'document_checkboxes2' => 'doh',
            'document_checkboxes3' => 'hipaa_state',
            'document_checkboxes4' => 'hipaa',
            'document_checkboxes5' => 'joinder',
            'document_checkboxes6' => 'map',
            'document_checkboxes7' => 'home',
            'document_checkboxes8' => 'mltc',
            'document_checkboxes9' => 'source',
            'document_checkboxes10' => 'tform',
        ];

        // Iterate through the checkboxes and update the checklist
        foreach ($checkboxes as $checkboxName => $checklistField) {
            $checklist->$checklistField = $request->has($checkboxName) ? 1 : 0;
        }
        $checklist->referral_id = $request->referral_id;

        $checklist->save();
        return response()->json(['message' => 'Checklist successfully updated']);
    }
    public function delete(Request $request, $id)
    {
        $referral = Referral::find($id);
        if (!$referral) {
            return redirect()->route('referral.list')->with('error', 'Referral record not found.');
        }
        $checklist = CheckList::where("referral_id", $id)->first();
        if ($checklist) {
            $checklist->delete();
        }
        $referral->delete();
        return redirect()->route('referral.list')->with('success', 'Referral deleted successfully.');
    }

    public function status(Request $request, $id)
    {

        $document = Referral::findOrFail($id);
        $document->status = $request->status;
        $document->save();
        return response()->json(['message' => 'Document updated successfully']);
    }
    public function documentStatus(Request $request, $id)
    {
        $approved = Session::get("loginId");
        $document = DocumentESign::findOrFail($id);
        $document->status = $request->status;
        $document->approved = $approved;
        $document->save();
        return response()->json(['message' => 'Document updated successfully']);
    }
    public function referralDocument(Request $request, $id)
    {
        $approved = Session::get("loginId");
        $approver = User::findOrFail($approved);
        $appoverName = $approver->name;
        $document = Documents::findOrFail($id);
        $document->status = $request->status;
        $document->approved_by = $approved;
        $document->save();
        return response()->json(['approver' => $appoverName, 'message' => 'Document updated successfully']);
    }
    public function emailStatus(Request $request, $id)
    {
        $document = Referral::findOrFail($id);
        $document->email_status = $request->status;
        $document->save();
        return response()->json(['message' => 'Document updated successfully']);
    }
    public function emergencyEdit(Request $request)
    {
        $data = EmergencyContacts::find($request->id);
        $data->emergency_first_name = $request->emergency_first_name;
        $data->emergency_last_name = $request->emergency_last_name;
        $data->emergency_ext_number = $request->emergency_ext;
        $data->emergency_phone_number = $request->emergency_phone;
        $data->emergency_state = $request->emergency_state;
        $data->emergency_email = $request->emergency_email;
        $data->emergency_relationship = $request->emergency_relationship;
        $data->emergency_city = $request->emergency_city;
        $data->emergency_zip_code = $request->emergency_zip;
        $data->emergency_apt_suite = $request->emergency_apt;
        $data->have_keys = $request->have_keys;
        $data->live_with_parents = $request->have_keys;
        $data->emergency_address = $request->emergency_address;

        // Save the updated data
        $data->save();

        // Return a response indicating success
        return response()->json(['message' => 'Emergency contact updated successfully']);
    }
    public function UserTrust(Request $request)
    {
        $referralTrust = Referral::findOrFail($request->referral_id);
        $esignTrust = $request->input('esign') === 'true' ? 33.33 : 0;
        $documentTrust = $request->input('document') === 'true' ? 33.33 : 0;
        $financeTrust = $request->input('finance') === 'true' ? 33.33 : 0;
        $checkListTrust = $request->input('checklist') === 'true' ? 33.33 : 0;
        $referralTrust->trustEsign = $esignTrust;
        $referralTrust->trustFinance = $financeTrust;
        $referralTrust->trustDocument = $documentTrust;
        $referralTrust->trustCheckList = $checkListTrust;
        $totalTrust = $esignTrust + $documentTrust + $financeTrust + $checkListTrust;
        $referralTrust->save();
        $totalTrust = $totalTrust > 99 ? 100 : $totalTrust;
        return response()->json(['trust' => $totalTrust, 'message' => 'Success']);
    }

    public function convert_to_customer(Request $request)
    {

        $referral = Referral::find($request->id);

        $user = new User();
        $user->role = "User";
        $user->billing_method = 'manual';
        $user->account_status = "Approved";
        $user->assignRole('user');
        $user->name = $referral->first_name;
        $user->last_name = $referral->last_name;
        $user->full_ssn = $referral->patient_ssn;
        $user->dob = $referral->date_of_birth;
        $user->address = $referral->address;
        $user->state = $referral->state;
        $user->city = $referral->city;
        $user->phone = "+1$referral->phone_number";
        $user->zipcode = $referral->zip_code;
        $user->gender = $referral->gender;
        $user->email = $referral->email;
        $user->user_balance = '0';
        $user->token = $request->_token . rand();
        $user->password = Hash::make(123456);
        $user->billing_cycle = $referral->bankAccount->billing_cycle;
        $user->surplus_amount = $referral->bankAccount->surplus_amount;
        $user->save();

        $referral->bankAccount()->update(["user_id" => $user->id]);

        $referral->convert_to_customer = $user->id;
        $referral->save();

        $directory = storage_path("app/public/$user->id");
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        $pdf = PDF::loadView('document.approval-letter-pdf', ['user' => $user])
            ->setOption([
                'fontDir' => public_path('/fonts'),
                'fontCache' => public_path('/fonts'),
                'defaultFont' => 'Nominee-Black'
            ])
            ->setPaper('A4', 'portrait');


        $savePath = $directory . '/approval' . date('Ymd_His') . '.pdf';

        $pdf->save($savePath);

        Mail::to($referral->email)->send(new ReferralConvertToCustomer($user, $savePath));

        return response()->json(['success' => 'Customer created successfully!', "user" => $user]);
    }

    public function getZipDetails(Request $request)
    {
        $zip = $request->postalcode;

        if (!$zip) {
            return response()->json(['error' => 'Postal code is required'], 400);
        }

        $url = "http://api.geonames.org/postalCodeLookupJSON?postalcode=$zip&country=US&username=alamgir000009";

        try {

            $response = file_get_contents($url);

            if (!$response) {
                return response()->json(['error' => 'Failed to fetch data from Geonames API'], 500);
            }

            $data = json_decode($response, true);
            return response()->json($data);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
