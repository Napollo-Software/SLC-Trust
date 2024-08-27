<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Followup;
use App\Models\User;
use App\Models\lead;
use App\Models\Referral;
use App\Models\Type;
use Illuminate\Support\Facades\Session;

class FollowupController extends Controller
{
    public function index(Request $request)
    {
        $data = Followup::all();
        $from = User::where('id', '=', Session::get('loginId'))->first();
        $to = Referral::all();
        return view('follow-up.index', compact('data', 'from', 'to'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'to' => 'required',
            'from' => 'required',
            'date' => 'required',
            'note' => 'required',
        ]);
        $followup = new Followup();
        $followup->from = $request->input('from');
        $followup->to = $request->input('to');
        $followup->date = $request->input('date');
        $followup->time = $request->input('time');
        $followup->note = $request->input('note');
        $followup->save();
        $type = new Type();
        $type->category = $request->type === "other" ? "Designation" : $request->type;
        $type->name = $request->type === "other" ? "Designation" : $request->type;

        $type->save();
        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        $followup = Followup::find($id);
        return view('follow-up.update', compact('followup'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'note' => 'required',
        ]);

        $followup = Followup::find($request->id);


        if (!$followup) {
            return response()->json(['message' => 'Follow-up not found'], 404);
        }

        $followup->to = $request->input('to');
        $followup->date = $request->input('date');
        $followup->time = $request->input('time');
        $followup->note = $request->input('note');
        $followup->save();

        return response()->json(['message' => 'Follow-up updated successfully']);
    }



    public function delete(Request $request, $id)
    {
        $followup = Followup::find($id);
        if ($followup) {
            $followup->delete();
            return redirect()->route('follow_up.list')->with('success', 'Follow-up record deleted successfully.');
        }
        return redirect()->route('follow_up.list')->with('error', 'Follow-up record not found.');
    }
}
