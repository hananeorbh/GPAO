<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5);
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $article = new Article();
        $article->name = $request->input('name');

        $types = $request->input('type');
        $typeValue = '';
        if ($types && is_array($types)) {
            $typeValue = implode(',', $types);
        }
        $article->type = $typeValue;

        $article->save();

        return redirect()->route('articles.index')->with('status', 'Article ajouté à la liste');
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $article = Article::findOrFail($id);
        $types = $request->input('type');
        $typeValue = implode(',', $types ?? []);

        $article->name = $request->input('name');
        $article->type = $typeValue;

        $article->save();

        return redirect()->route('articles.index')->with('status', 'Article modifié avec succès');
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->back()->with('success', 'Article supprimé avec succès.');
    }



    public function getArticlesByType(Request $request)
    {
        $type = $request->input('type');

        // Filtrer les articles par type
        $articles = Article::where('type', $type)->get();

        return response()->json($articles);
    }
}