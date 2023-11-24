<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = ['hora_entrada', 'hora_salida', 'id_jornada'];
    
    public function jornada()
    {
        return $this->belongsTo(Jornada::class, 'id_jornada');
    }
}
