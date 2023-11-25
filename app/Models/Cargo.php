<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'existe_vacante', 'departamento_id', 'jornada_id'];

    public function departamento()
    {
        return $this->belongsTo(Department::class);
    }

    public function jornada()
    {
        return $this->belongsTo(Jornada::class);
    }

    public function requisito(){
        return $this->hasOne(Requisito::class);
    }

    public function postulantes(){
        return $this->hasMany(Postulante::class);
    }

    public function empleados(){
        return $this->hasMany(Empleado::class);
    }
}
