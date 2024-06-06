<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
    // Route::post('categories/store', 'store')->name('categories.store');

    
    // Route::delete('categories{categorie}', 'destroy')->name('categories.destroy');

    // Route::get('categories/{id}/edit',  'edit')->name('categories.edit');
    // Route::put('categories/{categorie}', 'update')->name('categories.update');



});