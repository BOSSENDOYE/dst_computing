<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Stat extends Model {
    protected $fillable = ['valeur', 'label', 'couleur', 'contexte', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
