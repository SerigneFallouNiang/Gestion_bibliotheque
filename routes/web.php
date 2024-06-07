<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function(){

    Route::get('/inscription','inscription')->name('inscription');
    Route::post('/inscription','inscriptionPost')->name('inscription');

    Route::get('/connexion','connexion')->name('connexion');
    Route::post('/connexion','connexionPost')->name('connexion');

    // Route::delete('/deconnexion','deconnexion')->name('deconnexion');
});


Route::controller(CategorieController::class)->group(function (){
    Route::get('categories', 'index')->name('categories.index');

       //ajouter une categorie formulaire et enregistrement
    Route::get('categories/ajouter', 'ajouter')->name('categories.ajouter');
    Route::post('categories/ajouter', 'enregistrer')->name('categories.ajouter');

    Route::delete('categories{categorie}', 'supprimer')->name('categories.supprimer');

    Route::get('/modifier/{id}','modifier')->name('modifier');
    Route::post('/modifier/traitement/','modifierPost')->name('modifier');

});

Route::controller(LivreController::class)->group(function (){
    Route::get('livre', 'index')->name('livres.index');

       //ajouter une categorie formulaire et enregistrement
    Route::get('livres/ajouter', 'ajouter')->name('livres.ajouter');
    Route::post('livres/ajouter', 'enregistrer')->name('livres.ajouter');

    Route::get('livres/delete/{id}', 'supprimer')->name('livres.supprimer');

    Route::get('livres/modifier/{id}','modifier')->name('modifier');
    Route::post('/modifier/traitement/','modifierPost')->name('modifier');

});