<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function(){

    Route::get('/inscription','inscription')->name('inscription');
    Route::post('/inscription','inscriptionPost')->name('inscription');

    Route::get('/connexion','connexion')->name('connexion');
    Route::post('/connexion','connexionPost')->name('connexion');

    Route::delete('/deconnexion','deconnexion')->name('deconnexion');
});


Route::controller(CategorieController::class)->group(function (){
    Route::get('categories', 'index')->name('categories.index');

       //ajouter une categorie formulaire et enregistrement
    Route::get('categories/ajouter', 'ajouter')->name('categories.ajouter');
    Route::post('categories/ajouter', 'enregistrer')->name('categories.ajouter');

    Route::delete('categories{categorie}', 'supprimer')->name('categories.supprimer');

    Route::get('/modifier-categorie/{id}','modifier')->name('modifier')->where('id', '[0-9]+');
    Route::post('/modifier-categorie','modifierPost')->name('modifier');

});

Route::controller(LivreController::class)->group(function (){
    Route::get('livre', 'index')->name('livres.index');

       //ajouter une categorie formulaire et enregistrement
    Route::get('livres/ajouter', 'ajouter')->name('livres.ajouter');
    Route::post('livres/ajouter', 'enregistrer')->name('livres.ajouter');

    Route::get('livres/delete/{id}', 'supprimer')->name('livres.supprimer')->where('id', '[0-9]+');

    Route::get('livres/modifier/{id}','modifier')->name('livres.modifier')->where('id', '[0-9]+');
    Route::post('/modifier-livre','modifierlivre')->name('livres.modifier');

});


Route::controller(RayonController::class)->group(function(){
    Route::get('rayons','index')->name('rayons.index');

    Route::get('rayons/ajouter', 'ajouter')->name('rayons.ajouter');
    Route::post('rayons/enregistrer','enregistrer')->name('rayons.ajouter');
    Route::get('/modifier/{id}','modifier')->name('rayons.modifier')->where('id', '[0-9]+');
    Route::post('/traitement','modifierPost')->name('modifier');

    Route::delete('rayons/delete/{rayon}', 'supprimer')->name('rayons.supprimer');


});



Route::get('/categorie/{id}', [LivreController::class, 'filtrerParCategorie'])->name('livres.categorie')->where('id', '[0-9]+');
