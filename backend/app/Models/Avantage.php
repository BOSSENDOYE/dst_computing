<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Avantage extends Model {
    protected $fillable = ['icone_path', 'icone_bg', 'icone_color', 'titre', 'texte', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
