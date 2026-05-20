<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MissionItem extends Model {
    protected $fillable = ['icone_path', 'icone_bg', 'icone_color', 'barre', 'titre', 'texte', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
