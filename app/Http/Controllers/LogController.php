<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
class LogController extends Controller
{
   public function index(){
    $data = Log::orderBy('id','desc')->get();
    return view('logs.index', compact('data'));
   }

}
