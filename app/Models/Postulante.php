<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'edad', 'telefono', 'email', 'curriculum', 'cargo_id'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
