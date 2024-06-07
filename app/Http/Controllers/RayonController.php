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
}
