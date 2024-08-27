<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DropBox;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DropboxController extends Controller
{
    public function index(){
        $dropbox = DropBox::get();
        return view('dropbox.index',compact('dropbox'));
    }
    public function uploadBills(Request $request){
        foreach($request->file as $k=>$item){
            $attachment = time().$item->getClientOriginalName();
            $item->move(public_path('/dropbox'),$attachment);
            $data = new DropBox();
            $data->file = $attachment;
            $data->save();
        }
        alert()->success('Success!', 'Bills have been added successfully');
        return back();
    }
}
