<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AuthController;

class AuthController extends Controller
{
    public function inscription(){
        return view('utilisateurs.inscription');
       }

       public function inscriptionPost(Request $request){

        $user= new User();
        $user->nom=$request->nom;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->save();
        return redirect()->back();

       }

       public function connexion(){
        return view('utilisateurs.connexion');
       }

       public function connexionPost(Request $request){
        $creditials=[
            'email'=>$request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($creditials)){
            return redirect ('/')->with('success','connexion avec succes');
        }
     return back()->with('error','vérifier votre mail ou mot de passe');
       }

       public function deconnexion(){
        Auth::logout();
        return redirect()->route('connexion');
       }


}
