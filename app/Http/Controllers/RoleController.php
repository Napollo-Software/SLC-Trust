<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->select('id', 'name', 'created_at')->get();
        return view('roles.list', compact('roles'));
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        $assignedPermissions = $role->permissions->pluck('name')->toArray();
        $categories = DB::table('permissions')
            ->select('category')
            ->distinct()
            ->get()->toArray();
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions', 'assignedPermissions','categories'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'role_name' => [
                'required',
                Rule::unique('roles', 'name')->ignore($request->id),
            ],
            'permissions' => 'required',
        ],
        [
            'permissions.required' => 'Please assign the permissions'
        ]
        );

        $role = Role::findById($request->id);
        if ($role->name != $request->role_name){
            $role->update(['name'=>strtolower($request->role_name)]);
        }
        $role->syncPermissions($request->permissions);
        alert()->success('Role Updated','Your role has been updated successfully');

        return redirect('/roles');
    }

    public function delete(Request $request)
    {
        $role = Role::findById($request->id);
        $role->delete();
        alert()->success('Deleted!', 'Role has been deleted successfully');
        return redirect('/roles');
    }

    public function create()
    {
        $permissions = Permission::all();
        $categories = DB::table('permissions')
            ->select('category')
            ->distinct()
            ->get()->toArray(); 
        return view('roles.create', compact('permissions','categories'));
    }

    public function createRole(Request $request)
    {
        $request = $request->validate([
            'role_name' => 'required|unique:roles,name',
            'permissions' => 'required',
        ],
        [
            'permissions.required' => 'Please assign the permissions'
        ]);
        $role = Role::create([
            'name' => strtolower($request['role_name']),
            'guard_name' => 'web'
        ]);

        $role->givePermissionTo($request['permissions']);
        alert()->success('Added!', 'Role has been Added successfully');
        return redirect('/roles');
    }
}
