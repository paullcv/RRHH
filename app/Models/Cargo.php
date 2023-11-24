<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'requisitos', 'tipo', 'id_horario'];
    public function horario()
    {
        return $this->belongsTo(Horario::class, 'id_horario');
    }
}
