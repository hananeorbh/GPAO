<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Recette;
use App\Models\ConsommationIp;
use App\Models\Article;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
       
        $articlesPF = Article::where('type', 'PF')->get();
        $articlesIP = Article::where('type', 'IP')->get();
      
        $recettes = Recette::all();
         
        return view('recettes.index', compact('recettes','articlesPF', 'articlesIP'));
    }
    public function create()
    {
        $articlesPF = Article::where('type', 'PF')->get();
        $articlesIP = Article::where('type', 'IP')->get();
      
        $recettes = Recette::all();
         
        return view('recettes.create', compact('recettes','articlesPF', 'articlesIP'));
    }

    
 
    public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'article_pf_id' => 'required|exists:articles,id', // Validation de l'article PF
        'article_ip_id' => 'required|exists:articles,id', // Validation de l'article IP
        'quantite' => 'required',
        'unite' => 'required',
    ]);

    $recette = new Recette();

    $recette->article_pf_id = $request->input('article_pf_id');
    $recette->article_ip_id = $request->input('article_ip_id'); 
    $recette->quantite = $request->input('quantite');
    $recette->unite = $request->input('unite');
    
    
    if ($recette->save()) {
        
        return redirect()->route('recettes.index')->with('success', 'Recette créée avec succès.');
    } else {

        return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la recette.');
    }
}

public function update(Request $request, $id)
{
    // Validation des données
    $request->validate([
        'article_pf_id' => 'required|exists:articles,id',
        'article_ip_id' => 'required|exists:articles,id',
        'quantite' => 'required',
        'unite' => 'required',
    ]);

  
    $recette = Recette::findOrFail($id);

   
    $recette->article_pf_id = $request->input('article_pf_id');
    $recette->article_ip_id = $request->input('article_ip_id'); 
    $recette->quantite = $request->input('quantite');
    $recette->unite = $request->input('unite');
    if ($recette->save()) {
        
        return redirect()->route('recettes.index')->with('success', 'Recette créée avec succès.');
    } else {

        return redirect()->back()->with('error', 'Erreur lors de l\'enregistrement de la recette.');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Recette::findOrFail($id)->delete();
        return redirect()->route('recettes.index')->with('success', 'Recette supprimée avec succès.');
    }
}
