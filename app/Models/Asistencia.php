<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_asistencia', 'hora_entrada', 'hora_salida', 'empleado_id'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
