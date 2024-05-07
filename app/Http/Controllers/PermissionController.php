<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Models\User; 
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $aggregatedPermissions = [];
    
        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionName = $permission->name;
                if (!isset($aggregatedPermissions[$permissionName])) {
                    $aggregatedPermissions[$permissionName] = [
                        'permission' => $permission,
                        'rolesCount' => 1,
                    ];
                } else {
                    $aggregatedPermissions[$permissionName]['rolesCount']++;
                }
            }
        }}

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $permission = Permission::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'permissionName' => 'required|string|unique:permissions,name,' . $id,
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $permission->name = $request->permissionName; 
    $permission->save();

    return redirect()->route('roles.index')->with('success', 'Le nom de la permission a été mis à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            $permission = Permission::findById($id);
        
            if ($permission) {
                $permission->delete();
                return redirect()->back()->with('success', 'Le permission a été supprimé avec succès.');
            }
        
            return redirect()->back()->with('error', 'Le permission spécifié est introuvable.');
        }
    }
}