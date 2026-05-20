<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    protected $fillable = ['nom', 'logo_path', 'site_url', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
