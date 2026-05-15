<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model {
    protected $fillable = ['name','role','company','avatar_bg','text','is_active','ordre'];
    protected $casts = ['is_active'=>'boolean'];
}
