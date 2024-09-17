<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Referral;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    public function index()
    {

        $vendors = User::whereHas(
            'roles',

            function ($q) {
                $q->where('name', 'vendor');
            }
        )->orderBy('id', 'desc')->get();

        return view('vendors.index', compact('vendors'));
    }

    public function create()
    {
        $types = Type::where('category', 'Organization')->orderBy('id', 'DESC')->get()->toArray();
        return view('vendors.create', compact('types'));
    }

    public function store(Request $request)
    {
        $new_type = null;
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|unique:users,email',
            'phone' => 'required|max:250',
            'website' => 'nullable|max:250',
            'country' => 'required|max:250',
            'state' => 'required|max:250',
            'city' => 'required|max:250',
            'address1' => 'required|max:250',
            'address2' => 'nullable|max:250',
            'zipcode' => 'required|max:250',
            'type' => 'required|max:250',
            'other_type' => 'max:250|required_if:type,other',

        ]);

        if ($request->type === "other") {
            $type = new Type();
            $type->category = "Organization";
            $type->name = $request->other_type;
            $type->save();
            $new_type = $type->id;
        }
        $user = User::create([
            'name' => $request->name,
            'last_name' => '',
            'email' => $request->email,
            'phone' => $request->phone,
            'website' => $request->website,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address1,
            'address_2' => $request->address2,
            'zipcode' => $request->zipcode,
            'vendor_type_name' => $request->type,
            'vendor_type' => $new_type,
            'role' => 'Vendor',
            'password' => Hash::make('123456')
        ]);
        $user->assignRole('Vendor');
        alert()->success('Vendor Added', 'Vendor has been added successfully');
        return redirect('/vendors');
    }

    public function edit($id)
    {
        $vendor = User::find($id);
        $types = Type::where('category', 'Organization')->get()->toArray();
        return view('vendors.edit', compact('types', 'vendor'));
    }

    public function update(Request $request, $id)
    {
        $new_type = null;

        if ($request->type === "other") {
            $type = new Type();
            $type->category = $request->type === "other" ? "Designation" : $request->type;
            $type->name = $request->other_type;
            $type->save();
            $new_type = $type->id;
        }
        $request->validate([
            'name' => 'required|max:250',
            'email' => 'required|unique:users,email,' . $id,
            'phone' => 'required|max:250',
            'website' => 'nullable|max:250',
            'country' => 'required|max:250',
            'state' => 'required|max:250',
            'city' => 'required|max:250',
            'address1' => 'required|max:250',
            'address2' => 'nullable|max:250',
            'zipcode' => 'required|max:250',
            'type' => 'required|max:250',
            'other_type' => 'required_if:type,other',
        ]);
        $vendor = User::find($id);
        if ($vendor) {
            $vendor->update([
                'name' => $request->name,
                'last_name' => '',
                'email' => $request->email,
                'phone' => $request->phone,
                'website' => $request->website,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'address' => $request->address1,
                'address_2' => $request->address2,
                'zipcode' => $request->zipcode,
                'vendor_type_name' => $request->type,
                'vendor_type' => $new_type,
            ]);
        }
        alert()->success('Vendor Updated', 'Vendor has been updated successfully');
        return redirect('/vendors');
    }

    public function view($id)
    {

        $vendor = User::find($id);

        $types = Type::where('category', 'Organization')->get()->toArray();
        return view('vendors.view', compact('types', 'vendor',));
    }

    public function all_customers()
    {
        $UserRole = User::where('id', '=', Session::get('loginId'))->value('role');
        $vendor = User::where('id', Session::get('loginId'))->first();
        $contacts = $vendor->contacts;
        $referralsOfContacts = $contacts->flatMap(function ($contact) {
            return $contact->referrals;
        });
        $leads = $vendor->leads;
        $referralOfLeads = $leads->flatMap(function ($lead) {
            return $lead->referrals;
        });
        $referrals = $referralsOfContacts->merge($referralOfLeads);
        $all_referrals = $vendor->referrals->merge($referrals);
        $customersByCustomerId = [];
        $all_referrals->each(function ($referral) use (&$customersByCustomerId) {
            $customerId = $referral->convert_to_customer;
            $customer = User::find($customerId);
            if (!isset($customersByCustomerId[$customerId])) {
                $customersByCustomerId[$customerId] = [];
            }
            $customersByCustomerId[$customerId][] = $customer;
        });
        $customerIds = array_keys($customersByCustomerId);
        $converted_to_customers = User::whereIn('id', $customerIds)->get();


        return view('vendors.all_customers', compact('converted_to_customers', 'UserRole'));
    }
}
