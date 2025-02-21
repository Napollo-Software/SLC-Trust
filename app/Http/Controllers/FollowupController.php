<?php

namespace App\Http\Controllers;

use App\Models\lead;
use App\Models\Type;
use App\Models\User;
use App\Models\Followup;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class FollowupController extends Controller
{
    public function index(Request $request)
    {
        $auth = Auth::user();
        $role = $auth ? $auth->role : null;
        
        $routeName = Route::currentRouteName();

        $from = User::where('id', '=', Session::get('loginId'))->first();


        if ($routeName === 'follow_up.list') {
            $data = Followup::where('type', 'note')->get();
            $to = Referral::all();
            return view('follow-up.index', compact('data', 'from', 'to' , 'role'));
        } else if ($routeName === 'follow_up.index') {
            $query = Followup::where('type', 'followup');

            $user = User::find(Session::get('loginId'));

            if ($user->role == 'Employee') {
                $query->where(function ($q) use ($user) {
                    $q->where(function ($q2) use ($user) {
                        $q2->where('from', $user->id)
                           ->where('to', $user->id);
                    })
                    ->orWhere(function ($q3) use ($user) {
                        $q3->where('to', $user->id);
                    });
                });
            }

            $data = $query->get();

            $to = User::whereHas('roles', function ($query) {
                $query->where('role', 'employee');
            })->get();
            $referrals = Referral::all();
            return view('follow-up-new.index', compact('data', 'from', 'to', 'referrals' , 'role'));
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

        $data = $request->all();

        $followup = Followup::create([
            'from' => $request->from,
            'to' => $request->to,
            'date' => $request->date,
            'time' => $request->time,
            'note' => $request->note,
            'type' => $request->type,
            'referral_id' => (!empty($data['referral'])) ? $request->input('referral') : null
        ]);

        Type::create([
            'category' => $request->type === "other" ? "Designation" : $request->type,
            'name' => $request->type === "other" ? "Designation" : $request->type
        ]);

        return response()->json(['success' => true, "followup" => $followup, "message" => "Followup created successfully"]);
    }

    public function noteStore(Request $request)
    {
        $this->validate($request, [
            'note_id' => 'nullable|numeric|exists:followups,id',
            'to' => 'required|integer',
            'from' => 'required|integer',
            'note' => 'required|string|max:255',
            // 'type' => 'nullable|string'
        ], ['note_id.exists' => 'Note not found to be edited']);

        $followup = Followup::updateOrCreate(
            ['id' => $request->note_id],
            [
                'from' => $request->from,
                'to' => $request->to,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'note' => $request->note,
                'type' => 'note'
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

        $data = $request->all();
        $followup->to = $request->input('to') ?? $followup->to;
        $followup->date = $request->input('date');
        $followup->time = $request->input('time');
        $followup->note = $request->input('note');
        $followup->type = $request->input('type');
        $followup->referral_id = (!empty($data['referral'])) ? $request->input('referral') : null;
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

    public function toggleCompleted(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:followups,id',
            'completed' => 'required|in:true,false',
        ]);

        $followup = Followup::find($request->id);
        $followup->completed = !$followup->completed;
        $followup->completed_by = $request->completed == 'true' ? User::where('id', Session::get('loginId'))->value('id') : null;
        $followup->save();

        return response()->json(['success' => true]);
    }

}
