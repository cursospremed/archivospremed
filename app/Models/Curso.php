<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    public $timestamps = false;
    protected $guarded =[];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_curso');
    }
    public function modulos()
    {
        return $this->hasMany(Modulo::class);
    }
}
