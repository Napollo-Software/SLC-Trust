<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypesController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('id','desc')->get();
        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function edit($id)
    {
        $type = Type::find($id);
        echo $type;
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('types', 'name')->ignore($request->id),
            ],
            'category' => 'required',
        ]);
        $type = Type::find($request->id);
        if ($type) {
            $type->update([
                'name' => $request->name,
                'category' => $request->category
            ]);
        }
        return response()->json(['success' => "Type has been Updated successfully"]);
    }

    public function store(Request $request)
    {
        $request = $request->validate([
            'name' => 'required|unique:types,name',
            'category' => 'required',
        ]);
        $type = Type::create([
            'name' => $request['name'],
            'category' => $request['category'],
        ]);
        return response()->json(['success' => "Type has been added successfully",'detail' => $type]);
    }

    public function destroy($id)
    {
        $type = Type::find($id);
        if ($type) {
            $type->delete();
        }
        return response()->json(['success' => "Type has been Deleted successfully"]);
    }
    public function view($id)
    {
        $type = Type::find($id);
        return view('types.view', compact('type'));
        
    }
}
