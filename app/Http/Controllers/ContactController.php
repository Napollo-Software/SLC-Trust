<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Type;
use App\Models\User;
use App\Models\contacts;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = contacts::orderBy('id','desc')->get();
        $designation = Type::where('category', 'Designation')->get();
        $types = Type::all();
        $accounts = User::where('role', 'Vendor')->get();
        return view('contacts.index', compact('types', 'designation', 'contacts', 'accounts'));
    }
    public function store(Request $request)
    {
        $type = new Type();
        $new_type=0;


        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'fax' => 'required',
            'email' => 'required|unique:contacts,email',
            'account' => 'required',
            $this->validate($request, [
                'designation' => 'required',
                'other_type' => 'required_if:designation,other,Other',
            ])        ,
            'phone' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
        ]);

        if ($request->designation === "other"  ) {

            $type->category = "Designation";
            $type->name = $request->other_type;
            $type->save();
            $new_type = $type->id;

        }
        $data = new contacts();
        $data->fname =  $request->fname;
        $data->lname =  $request->lname;
        $data->email =  $request->email;
        $data->name_of_practice = $request->name_of_practice;
        $data->account = $request->account;
        $data->designation = $request->designation === "other" ? $new_type : $request->designation;
        $data->fax = $request->fax;
        $data->ext_number = $request->ext_no;
        $data->phone = $request->phone;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->zip_code = $request->zipcode;
        $data->address = $request->address;
        $data->created_by = Session::get('loginId');
        $data->save();




        return response()->json(['success' => 'Contact Added Successfully!']);
    }
    public function edit(Request $request)
    {
        $contact = contacts::find($request->id);
        return response()->json($contact);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|max:250',
            'lname' => 'required|max:250',
            'email' => [
                'required',
                Rule::unique('users', 'email')
            ],
            'account' => 'required|max:250',
            $this->validate($request, [
                'designation' => 'required',
                'other_type' => 'required_if:designation,9',
            ])        ,
            'phone' => 'required|',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required|max:250',
            'zipcode' => 'required|max:250',
            'address' => 'required|max:250',
            'ext_no' => 'max:250',
            'fax' => 'max:250',
        ]);
        $type = new Type();
        $new_type=0;

        if ($request->designation === "other") {
            $type->category = "Designation";
            $type->name = $request->other_type;
            $type->save();
            $new_type = $type->id;
        }
        $data = contacts::find($request->id);
        $data->fname =  $request->fname;
        $data->lname =  $request->lname;
        $data->email =  $request->email;
        $data->name_of_practice = $request->name_of_practice;
        $data->account = $request->account;
        $data->designation = $request->designation === "other" ? $new_type : $request->designation;
        $data->fax = $request->fax;
        $data->ext_number = $request->ext_no;
        $data->phone = $request->phone;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->zip_code = $request->zipcode;
        $data->address = $request->address;
        $data->save();
        return response()->json(['success' => 'Contact updated Successfully!']);
    }
    public function delete(Request $request)
    {
        $contact = contacts::find($request->id);
        $contact->delete();
        return response()->json(['success'=>'Contact deleted Successfully!']);
    }
}
