<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    public function index(){
        $rayons=Rayon::all();
        return view('rayons.index', compact('rayons'));
    }

    public function ajouter(){
        $rayons = Rayon::all();
        return view('rayons.ajouter', compact('rayons'));
    }

    public function enregistrer(Request $request){
        Rayon::create($request->all());
        return redirect()->route('rayons.index')->with('success', 'Le rayon a été mis à jour avec succès.');
    }

    public function modifier($id){
        $rayons=Rayon::find($id);
        return view('rayons.modifier', compact('rayons'));
    }

    public function modifierPost(Request $request){
        $rayons=Rayon::find($request->id);
        if ($rayons) {
            $rayons->libelle = $request->libelle;
            $rayons->partie = $request->partie;
            $rayons->update();
            return redirect()->route('rayons.index')->with('success', 'Le rayon a été mis à jour avec succès.');
        }
    
        return redirect()->back()->with('error', 'Le rayon n\'a pas été trouvé.');
    }

    public function supprimer(Rayon $rayon)
    {
        $rayon->delete();

        return redirect()->route('rayons.index')->with('success', 'Le rayon a été  supprimer avec succès.');

    }
}




