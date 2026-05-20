<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Valeur extends Model {
    protected $fillable = ['titre', 'texte', 'num_bg', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
