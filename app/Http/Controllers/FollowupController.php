<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Followup;
use App\Models\User;
use App\Models\lead;
use App\Models\Referral;
use App\Models\Type;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class FollowupController extends Controller
{
    public function index(Request $request)
    {
        $routeName = Route::currentRouteName();

        $from = User::where('id', '=', Session::get('loginId'))->first();


        if ($routeName === 'follow_up.list') {
            $data = Followup::where('type','note')->get();
            $to = Referral::all();
            return view('follow-up.index', compact('data', 'from', 'to'));
        }else if ($routeName === 'follow_up.index') {
            $data = Followup::where('type','followup')->get();
            $to = User::whereHas('roles', function ($query) {
                $query->where('role', 'employee'); // Filter users with role 'employee'
            })->get();
            return view('follow-up-new.index', compact('data', 'from', 'to'));
        }
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'to' => 'required',
            'from' => 'required',
            'date' => 'required',
            'note' => 'required',
            'type' => 'required',
        ]);
        $followup = new Followup();
        $followup->from = $request->input('from');
        $followup->to = $request->input('to');
        $followup->date = $request->input('date');
        $followup->time = $request->input('time');
        $followup->note = $request->input('note');
        $followup->type = $request->input('type');
        $followup->save();
        $type = new Type();
        $type->category = $request->type === "other" ? "Designation" : $request->type;
        $type->name = $request->type === "other" ? "Designation" : $request->type;

        $type->save();
        return response()->json(['success' => true]);
    }

    public function noteStore(Request $request)
    {
        $this->validate($request, [
            'note_id' => 'nullable|numeric|exists:followups,id',
            'to' => 'required|integer',
            'from' => 'required|integer',
            'note' => 'required|string|max:255',
            'type' => 'nullable|string'
        ], ['note_id.exists' => 'Note not found to be edited']);

        $followup = Followup::updateOrCreate(
            ['id' => $request->note_id],
            [
                'from' => $request->from,
                'to' => $request->to,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'note' => $request->note,
            ]
        );

        if ($request->has('type')) {
            Type::create([
                'category' => $request->type === 'other' ? 'Designation' : $request->type,
                'name' => $request->type === 'other' ? 'Designation' : $request->type,
            ]);
        }

        $message = $request->note_id ? 'Note updated successfully.' : 'Note created successfully.';

        return response()->json(['success' => true, 'message' => $message, 'note' => $followup]);
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
            'type' => 'required',
        ]);

        $followup = Followup::find($request->id);


        if (!$followup) {
            return response()->json(['message' => 'Follow-up not found'], 404);
        }

        $followup->to = $request->input('to');
        $followup->date = $request->input('date');
        $followup->time = $request->input('time');
        $followup->note = $request->input('note');
        $followup->type = $request->input('type');
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
