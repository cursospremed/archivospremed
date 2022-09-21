<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos';
    public $timestamps = false;
    protected $guarded = [];
    
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class);
    }
    public function cursos()
    {
        return $this->belongsToMany(Curso::class, 'alumno_curso');
    }
}
