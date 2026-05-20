<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Technologie extends Model {
    protected $fillable = ['nom', 'ordre', 'actif'];
    protected $casts = ['actif' => 'boolean'];
}
