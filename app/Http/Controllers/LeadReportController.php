<?php

namespace App\Http\Controllers;

use App\Models\contacts;
use App\Models\Lead;
use App\Models\Referral;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeadReportController extends Controller
{

    public function index()
    {
        $vendors = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor');
            }
        )->orderBy('id', 'desc')->get();
        return view('leadreport.index', compact('vendors'));
    }
    public function vendorDetails(Request $request)
    {
        $contacts = contacts::with('user_report')->get();
        $user = User::where('id', $request->id)->first();
        return view('leadreport.view', compact('user', 'contacts'));
    }
    public function create()
    {

        return view('leadreport.add');
    }



    public function getData(Request $request)
    {
        $selectedTables = $request->input('selectedTables');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $data = [];

        if (in_array('account', $selectedTables)) {
            $data['accounts'] = User::whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay(),
            ])->get();
        }

        if (in_array('referral', $selectedTables)) {
            $data['referrals'] = Referral::whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay(),
            ])->get();
        }

        if (in_array('lead', $selectedTables)) {
            $data['leads'] = Lead::whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay(),
            ])->get();
        }

        if (in_array('contacts', $selectedTables)) {
            $data['contacts'] = contacts::whereBetween('created_at', [
                Carbon::parse($start_date)->startOfDay(),
                Carbon::parse($end_date)->endOfDay(),
            ])->get();
        }

        return response()->json($data);
    }
}
