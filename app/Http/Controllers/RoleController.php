<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all(); // Obtenir la liste des permissions disponibles
        $aggregatedPermissions = [];

        foreach ($roles as $role) {
            foreach ($role->permissions as $permission) {
                $permissionName = $permission->name;
                if (!isset($aggregatedPermissions[$permissionName])) {
                    $aggregatedPermissions[$permissionName] = [
                        'permission' => $permission,
                    ];
                }
            }
        }

        // Passer l'ID du rôle à la vue
        $roleId = $roles->isEmpty() ? null : $roles->first()->id; // Assurez-vous que $roleId est null si $roles est vide
        return view('roles.index', compact('roles', 'permissions', 'aggregatedPermissions', 'roleId'));
    }
    public function store(Request $request)
{
    // Valider les données du formulaire
    $validatedData = $request->validate([
        'role' => 'required|unique:roles,name|max:255',
        'permissions' => 'required|array',
        'permissions.*' => 'exists:permissions,id', // Vérifie que chaque permission existe dans la table des permissions
    ]);

    try {
        // Créer le nouveau rôle
        $role = Role::create([
            'name' => $validatedData['role'],
            'guard_name' => 'web', 
        ]);

        // Associer les permissions sélectionnées au rôle
        $role->syncPermissions($validatedData['permissions']);

        return redirect()->route('roles.index')->with('success', 'Le rôle a été créé avec succès.');
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Une erreur est survenue lors de la création du rôle. Veuillez réessayer.']);
    }
}



    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Le rôle a été supprimé avec succès.');
    }

    

}