<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class MembreEquipe extends Model {
    protected $table = 'membres_equipe';
    protected $fillable = ['nom','initiales','poste','bio','competences','avatar_bg','is_active','ordre'];
    protected $casts = ['competences'=>'array','is_active'=>'boolean'];
}
