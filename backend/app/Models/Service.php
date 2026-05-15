<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model {
    protected $fillable = [
        'titre','description','icon_path','items',
        'icon_bg','icon_color','accent_bar','link_color','href','is_active','ordre',
    ];
    protected $casts = ['items'=>'array','is_active'=>'boolean'];
}
