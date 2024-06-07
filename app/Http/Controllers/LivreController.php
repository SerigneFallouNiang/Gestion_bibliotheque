<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    public function ajouter()
    {
        $livres = Livre::all();
        return view('livres.ajouter', compact('livres'));
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
        return view('livres.modifier',compact('livres'));
    }

    // public function modifierlivre(Request $request, Livre $livres){
    //     $livres->update($request->all());
    //     return redirect()->route('livres.index');

    // }

    public function modifierlivre(Request $request){
        // $request->validate([
            
        //     'nom'  => 'required',
        //     'prenom'  => 'required',
        //     'classe'  => 'required',
        // ]);

        $livres =Livre::find($request->id);
            $livres->titre=$request->titre;
            $livres->date_de_publication=$request->date_de_publication;
            $livres->nombre_de_pages=$request->nombre_de_pages;
            $livres->auteur=$request->auteur;
            $livres->isbn=$request->isbn;
            $livres->editeur=$request->editeur;
            $livres->update();

            return redirect()->route('livres.index');

}
}
