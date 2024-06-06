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
        return redirect()->back();

    }
}
