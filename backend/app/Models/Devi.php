<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $table = 'devis';

    protected $fillable = [
        'nom_complet',
        'structure',
        'telephone',
        'email',
        'localisation',
        'type_projet',
        'secteur',
        'description_besoin',
        'budget_estimatif',
        'delai_souhaite',
        'source_contact',
        'piece_jointe',
        'statut',
        'notes_internes',
    ];
}
