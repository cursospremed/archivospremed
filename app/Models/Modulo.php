<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    protected $table = 'modulos';
    public $timestamps = false;
    protected $guarded = [];
    public function campos()
    {
        return $this->hasMany(Campo::class);
    }
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
