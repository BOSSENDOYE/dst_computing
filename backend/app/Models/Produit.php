<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model {
    use SoftDeletes;
    protected $fillable = [
        'nom','tagline','secteur','description','techs','features',
        'href','accent_color','badge_class','bg_gradient','icon_path',
        'btn_bg','is_active','ordre',
    ];
    protected $casts = ['techs'=>'array','features'=>'array','is_active'=>'boolean'];
}
