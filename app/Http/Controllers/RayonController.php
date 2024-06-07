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
        return redirect()->back();
    }
}
