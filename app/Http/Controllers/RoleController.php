<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id')->paginate(5);
        return view('roles.index', compact('roles'));
    }
  
    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }
  
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);

            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index');
    }

    public function edit($id)
{
}

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required|array',
        ]);

        $role = Role::create(['name' => $request->input('name')]);

        foreach ($request->input('permission') as $permissionId) {
            $permission = Permission::find($permissionId);

            if ($permission) {
                $role->givePermissionTo($permission);
            }
        }

        return redirect()->route('roles.index');
    }


    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index');
    }
}
