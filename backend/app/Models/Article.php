<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'titre',
        'slug',
        'extrait',
        'contenu',
        'image_couverture',
        'categorie',
        'tags',
        'auteur_id',
        'auteur',
        'temps_lecture',
        'statut',
        'publie_le',
    ];

    protected $casts = [
        'tags'      => 'array',
        'publie_le' => 'datetime',
    ];
}
