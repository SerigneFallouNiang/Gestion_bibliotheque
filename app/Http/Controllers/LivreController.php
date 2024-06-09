<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use App\Models\Rayon;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        $categories=Categorie::all();
        return view('livres.index', compact('livres','categories'));
    }

    public function ajouter()
    {
        $livres = Livre::all();
        $categories=Categorie::all();
        $rayons=Rayon::all();
        return view('livres.ajouter', compact('livres','categories','rayons'));
    }

    public function enregistrer(Request $request)
    {
        Livre::create($request->all());
        return redirect()->route('livres.index');
    }

    public function supprimer($id){
        $livre=Livre::find($id);
        $livre->delete();
        return redirect()->back();

    }


    public function modifier($id){
        $livres=Livre::find($id);
        $categories=Categorie::all();
        $rayons=Rayon::all();
        return view('livres.modifier',compact('livres','categories','rayons'));
    }

    // public function modifierlivre(Request $request, Livre $livres){
    //     $livres->update($request->all());
    //     return redirect()->route('livres.index');

    // }

    public function modifierlivre(Request $request){
            $request->validate([
                'titre' => 'required|string|max:255',
                'auteur' => 'required|string|max:255',
                'editeur' => 'required|string|max:255',
                'date_de_publication' => 'required|date',
                'nombre_de_pages' => 'required|integer',
                'url_image' => 'required|string',
                'isbn' => 'nullable|string|max:20',
                'categorie_id' => 'required|integer',
                'rayon_id' => 'required|integer',
            ]);

            $livres = Livre::find($request->id);
            $livres->titre = $request->titre;
            $livres->date_de_publication = $request->date_de_publication;
            $livres->nombre_de_pages = $request->nombre_de_pages;
            $livres->auteur = $request->auteur;
            $livres->isbn = $request->isbn;
            $livres->editeur = $request->editeur;
            $livres->url_image = $request->url_image;
            $livres->categorie_id = $request->categorie_id;
            $livres->rayon_id = $request->rayon_id;
            $livres->update();

            return redirect()->route('livres.index')->with('error','vérifier votre mail ou mot de passe');
        }




        public function filtrerParCategorie($id)
{
    $livres = Livre::where('categorie_id', $id)->get();
    $categories = Categorie::all();
    $categorieActuelle = Categorie::find($id);
    return view('livres.index', compact('livres', 'categories', 'categorieActuelle'));
}

}
