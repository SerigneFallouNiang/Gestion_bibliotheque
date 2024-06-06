<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function ajouter()
      {
          return view('categories.ajouter');
      }

    // Enregistrer une nouvelle catégorie
    public function enregistrer(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')
                        ->with('success', 'Catégorie créée avec succès.');
    }

    public function supprimer(Categorie $categorie)
    {
        $categorie->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Catégorie supprimée avec succès.');
    }
}
