<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomina extends Model
{
    use HasFactory;
    protected $fillable = ['fecha_pago', 'salario', 'deduccion', 'bonificacion', 'pago_neto', 'estado_pago', 'empleado_id'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
