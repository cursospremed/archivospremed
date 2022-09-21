<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $table = 'asistencias';
    public $timestamps = false;
    protected $guarded =[];
    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
