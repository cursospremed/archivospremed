<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;
    protected $table = 'examenes';
    public $timestamps = false;
    protected $guarded = [];
    public function campo()
    {
        return $this->belongsTo(Campo::class);
    }
}
