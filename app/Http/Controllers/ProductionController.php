<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Atelier;
use App\Models\Ligne;
use App\Models\Production;
use App\Models\Article;
use App\Models\Catalog;
use App\Models\ConsommationIp;
use App\Models\Recette;

class ProductionController extends Controller
{
    public function index()
    {
        $consommations_ip = ConsommationIp::all();
        $productions = Production::paginate(5);
        $ateliers = Atelier::all();
        $lignes = Ligne::all();
        $articles = Article::all();
        
        return view('productions.index', compact('productions', 'ateliers', 'lignes', 'articles','consommations_ip'));
    }

    public function create()
    {
        $ateliers = Atelier::all();
        $lignes = Ligne::all();
        $articles = Article::all();
        return view('productions.create', compact('ateliers', 'lignes', 'articles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'quantité' => 'required',
            'unité' => 'required',
            'lot' => 'required',
            'atelier_id' => 'required',
            'ligne_id' => 'required',
            'article_id' => 'required',
            'quart' => 'required',
            'équipe' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $production = new Production();
    
        $production->date = $request->input('date');
        $production->quart = $request->input('quart');
        $production->équipe = $request->input('équipe');
        $production->atelier_id = $request->input('atelier_id');
        $production->ligne_id = $request->input('ligne_id');
        $production->article_id = $request->input('article_id');
        
        // Vérifier si le champ "type" est un tableau
        if (is_array($request->input('type'))) {
            // Si c'est un tableau, utiliser implode()
            $production->type = implode(',', $request->input('type'));
        } else {
            // Si ce n'est pas un tableau, affecter directement la valeur (ou une valeur par défaut)
            $production->type = $request->input('type') ?? ''; // Utilisation de la syntaxe ?? pour une valeur par défaut
        }
        
        $production->unité = $request->input('unité');
        $production->quantité = $request->input('quantité');
        $production->lot = $request->input('lot');
        $production->arret = $request->has('arret') ? 1 : 0;

        $production->save();
        
        // Si un arrêt est déclaré, enregistrez-le également
        if ($request->has('duration')) {
            $arret = new Arret();
            $arret->duration = $request->input('duration');
            $arret->masqué = $request->input('masqué');
            $arret->famille = $request->input('famille');
            $arret->sfamille = $request->input('sfamille');
            $arret->production_id = $production->id; // Associez l'arrêt à la production créée
            $arret->catalog_id = $request->input('catalog_id');
            $arret->save();
        }
        // Si une consommation est déclarée, enregistrez-la également
if ($request->has('quantite')) {
    $consommation = new ConsommationIp();
    $consommation->quantité = $request->input('quantite');
    $consommation->unité = $request->input('unité');
    $consommation->production_id = $production->id; // Associez la consommation à la production créée
    $consommation->article_id = $request->input('article_id'); // Vous pouvez également associer un article s'il est disponible dans la requête
    $consommation->save();
}

        return redirect()->route('productions.index')->with('status', 'Production ajoutée à la liste');
    }

    

    public function edit($id)
    {
       
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'quantité' => 'required',
            'unité' => 'required',
            'lot' => 'required',
            'atelier_id' => 'required',
            'ligne_id' => 'required',
            'article_id' => 'required',
            'quart' => 'required',
            'équipe' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $production = Production::findOrFail($id);

        $production->date = $request->input('date');
        $production->quart = $request->input('quart');
        $production->équipe = $request->input('équipe');
        $production->atelier_id = $request->input('atelier_id');
        $production->ligne_id = $request->input('ligne_id');
        $production->article_id = $request->input('article_id');
        $production->type = implode(',', $request->input('type') ?? []);
        $production->unité = $request->input('unité');
        $production->quantité = $request->input('quantité');
        $production->lot = $request->input('lot');
        $production->save();

        return redirect()->route('productions.index')->with('status', 'Production modifiée avec succès');
    }

    public function destroy($id)
    {
        Production::findOrFail($id)->delete();
        return redirect()->route('productions.index')->with('success', 'Production supprimée avec succès.');
    }

    public function show($id)
    {
        // Récupérez la production en cours
        $production = Production::findOrFail($id);
    
        // Récupérez toutes les recettes associées à cet article PF
        $recettes = Recette::where('article_pf_id', $production->article_id)->get();
    
        // Autres données que vous souhaitez passer à la vue
        $catalogs = Catalog::all();
        $arrets = $production->arrets ?? [];
    
        // Récupérez les noms de l'article, de l'atelier et de la ligne
        $articleName = $production->article->name;
        $atelierName = $production->atelier->name;
        $ligneName = $production->ligne->name;
    
        // Passez les données à la vue
        return view('productions.show', compact('production', 'arrets', 'catalogs', 'articleName', 'atelierName', 'ligneName', 'recettes'));
    }
    

    
    


    public function getLignes($atelierId)
    {
        $lignes = Ligne::where('atelier_id', $atelierId)->get();
        return response()->json($lignes);
    }

    
}