<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'date_de_publication',
        'nombre_de_pages',
        'auteur',
        'isbn',
        'editeur',
        'categorie_id',
        'rayon_id',
    ];

   

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function rayon()
    {
        return $this->belongsTo(Rayon::class);
    }

    // public function utilisateur()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
