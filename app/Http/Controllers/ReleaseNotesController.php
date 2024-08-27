<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReleaseNotes;
use Session;
class ReleaseNotesController extends Controller
{
    public function index(){
        $release_notes = ReleaseNotes::orderBy('id','DESC')->get();
        return view('release-notes.index',compact('release_notes'));
    }
    public function store(Request $request){
        $this->validate($request,[
            'details' => 'required'
        ]);
        $data = new ReleaseNotes();
        $data->notes = $request->details;
        $data->created_by = Session::get('loginId');
        $data->save();
        return response()->json(['success' => true]);
    }
}
