<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Imports\ArchiveImport;
use App\Models\Archive;
use App\Models\Claim;
use Carbon\Carbon;
 
class ArchiveController extends Controller
{
    public function archive(Request $request){
        if($request->ajax()){
            $data = Archive::where('matter','LIKE','%'.$request->searched_text.'%')
            ->orwhere('payee','LIKE','%'.$request->searched_text.'%')
            ->orwhere('description','LIKE','%'.$request->searched_text.'%')
            ->orwhere('account','LIKE','%'.$request->searched_text.'%')
            ->orwhere('split_account','LIKE','%'.$request->searched_text.'%')
            ->orwhere('deposit','LIKE','%'.$request->searched_text.'%')
            ->orwhere('payment','LIKE','%'.$request->searched_text.'%')
            ->orwhere('balance','LIKE','%'.$request->searched_text.'%')
            ->withCasts([
                'last_posted_at' => 'datetime'
            ])
            ->get();
            return response()->json($data);
        }
        if($request->has('filter')){
            $start = Carbon::parse($request->from);
            $end = Carbon::parse($request->to);
            $data = Archive::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();
            $start = $request->from;
            $end = $request->to;
            $stats = Archive::orderBy('id','ASC')->get();
            return view('archive.index', compact('data','start','end','stats'));
        }
        $start = null;
        $end = null;
        $data  = Archive::orderBy('id','ASC')->take('500')->get();
        $stats = Archive::orderBy('id','ASC')->get();
        return view('archive.index', compact('data','start','end','stats'));
    }
    
    public function import_archive(Request $request){
        Excel::import(new ArchiveImport,$request->file);
        return back;

    }
    public function archived_bills() {
        $archived = Claim::where('archived',"!=",null)->orderBy('id','DESC')->get();
        return view('archive.bills',compact('archived'));
    }
}
