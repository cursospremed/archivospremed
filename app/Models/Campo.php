<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campo extends Model
{
    use HasFactory;
    protected $table = 'campos';
    public $timestamps = false;
    protected $guarded = [];
    public function examens()
    {
        return $this->hasMany(Examen::class);
    }
    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }
}
