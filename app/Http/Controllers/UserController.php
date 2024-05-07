<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
public function index(Request $request)
    {
        $roles = Role::all();
        $users = User::all(); 
        return view('users.index', compact('users', 'roles'));
    }
    
   


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    $roles = Role::all();
    return view('users.create', compact('roles'));
}

      
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|min:8|max:255',
        'role_id' => 'required|exists:roles,id',
    ]);

    // Création d'un nouvel utilisateur
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    
    // Enregistrer l'utilisateur
    $user->save();

    // Associer le rôle sélectionné à l'utilisateur
    $role = Role::findOrFail($request->role_id);
    $user->assignRole($role);

    return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
}

    /**
     * Show the form for editing the specified resource.
     */
 
    public function edit(string $id)
        {
            $user = User::findOrFail($id);
            $roles = Role::all(); // Ajoutez cette ligne pour récupérer tous les rôles
            return view('users.edit', compact('user', 'roles'));
        }
        
    

    /**
     * Update the specified resource in storage.
     */
   /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id)
{
    // Validation des données
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:8|max:255',
        'role_id' => 'required|exists:roles,id',
    ]);

    // Recherche de l'utilisateur à mettre à jour
    $user = User::findOrFail($id);
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->has('password')) {
        $user->password = bcrypt($request->password);
    }
    $user->save();

    // Supprimer tous les rôles de l'utilisateur
    $user->syncRoles([]);

    // Ajouter le nouveau rôle à l'utilisateur
    $role = Role::findOrFail($request->role_id);
    $user->assignRole($role);

    return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    
}