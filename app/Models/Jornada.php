<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
    use HasFactory;
    protected $fillable = ['tipo', 'cantidad_horas', 'horario_id'];
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
}
