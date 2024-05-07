<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsommationIp; 
use App\Models\Article; 
use Illuminate\Routing\Controller;
use App\Models\Recette;

class ConsommationController extends Controller
{
    
   // Afficher la liste des consommations IP
   public function index()
   {
       // Afficher la liste des arrêts
       $consommations_ip = ConsommationIp::paginate(5);
    
       $recettes = \App\Models\Recette::paginate(5);
       return view('consommations.index', compact('consommations_ip','recettes'));
   }

   // Afficher le formulaire de création d'une nouvelle ressource
public function create()
{
    // Récupérer tous les articles depuis la base de données
    $articles = Article::all();

    // Passer les articles à la vue
    return view('productions.show', compact('articles'));
}

   // Enregistrer une nouvelle ressource
   public function store(Request $request, $productionId)
   {
       // Validation des données du formulaire
       $validatedData = $request->validate([
           'article_id' => 'required',
           'quantité' => 'required',
           'unité'=> 'required',
           'production_id' => 'required',
       
       ]);
   
       // Création d'un nouvel conso avec l'ID de la production
       $validatedData['production_id'] = $productionId;
       ConsommationIp::create($validatedData);
   
       // Redirection avec un message de succès
       return redirect()->back()->with('success', 'conso déclaré avec succès.');
   }
   // Afficher une ressource spécifique
   public function show($id)
   {
       // Afficher les détails d'un arrêt spécifique
       $ConsommationIp = ConsommationIp::findOrFail($id);
       return view('consommations.show', compact('ConsommationIp'));
   }

   // Afficher le formulaire de modification d'une ressource spécifique
   public function edit($id)
   {
       // Afficher le formulaire de modification d'un arrêt
       $ConsommationIp = ConsommationIp::findOrFail($id);
       return view('consommations.edit', compact('ConsommationIp'));
   }

   // Mettre à jour une ressource spécifique
   public function update(Request $request, $id)
   {
       // Validation des données du formulaire
       $validatedData = $request->validate([
           'article_id' => 'required',
           'quantité' => 'required',
           'unité'=> 'required',
           'production_id' => 'required',
         
       ]);

       // Mettre à jour l'arrêt
       ConsommationIp::whereId($id)->update($validatedData);

       // Redirection avec un message de succès
       return redirect()->route('consommations.index')->with('success', 'Arrêt mis à jour avec succès.');
   }

   // Supprimer une ressource spécifique
   // Supprimer une ressource spécifique
   public function destroy(string $id)
   {
       try {
           $ConsommationIp = ConsommationIp::findOrFail($id);
           $ConsommationIp->delete();
           return redirect()->back()->with('success', 'Consommation supprimée avec succès.');
       } catch (\Exception $e) {
           return redirect()->back()->withErrors(['error' => 'Une erreur est survenue lors de la suppression de la consommation.']);
       }
   }

}