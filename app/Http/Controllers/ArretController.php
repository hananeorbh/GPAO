<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller; // Import de la classe Controller
use App\Models\Arret;

class ArretController extends Controller
{
    // Afficher une liste des ressources
    public function index()
    {
        // Afficher la liste des arrêts
        $arrets = Arret::paginate(5);
        return view('arrets.index', compact('arrets'));
    }

    // Afficher le formulaire de création d'une nouvelle ressource
    public function create()
    {
        // Afficher le formulaire de création d'un nouvel arrêt
        return view('arrets.create');
    }

    // Enregistrer une nouvelle ressource
    public function store(Request $request, $productionId)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'duration' => 'required',
            'masqué' => 'required',
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
            'catalog_id' => 'required',
        ]);
    
        // Création d'un nouvel arrêt avec l'ID de la production
        $validatedData['production_id'] = $productionId;
        Arret::create($validatedData);
    
        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Arrêt déclaré avec succès.');
    }
    // Afficher une ressource spécifique
    public function show($id)
    {
        // Afficher les détails d'un arrêt spécifique
        $arret = Arret::findOrFail($id);
        return view('arrets.show', compact('arret'));
    }

    // Afficher le formulaire de modification d'une ressource spécifique
    public function edit($id)
    {
        // Afficher le formulaire de modification d'un arrêt
        $arret = Arret::findOrFail($id);
        return view('arrets.edit', compact('arret'));
    }

    // Mettre à jour une ressource spécifique
    public function update(Request $request, $id)
    {
        // Validation des données du formulaire
        $validatedData = $request->validate([
            'duration' => 'required',
            'masqué' => 'required',
            'famille' => 'required',
            'sfamille' => 'required',
            'class' => 'required',
            'impact' => 'required',
            'catalog_id' => 'required',
        ]);

        // Mettre à jour l'arrêt
        Arret::whereId($id)->update($validatedData);

        // Redirection avec un message de succès
        return redirect()->route('arrets.index')->with('success', 'Arrêt mis à jour avec succès.');
    }

    // Supprimer une ressource spécifique
    // Supprimer une ressource spécifique
    public function destroy(string $id)
    {
        try {
            $arret = Arret::findOrFail($id);
            $arret->delete();
            return redirect()->back()->with('success', 'Consommation supprimée avec succès.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la consommation.']);
        }
    }

}