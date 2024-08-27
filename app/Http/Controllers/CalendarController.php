<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $followup = Followup::select('note', 'date')->get();
       
        return view('calendar', compact('followup'));
    }
}
