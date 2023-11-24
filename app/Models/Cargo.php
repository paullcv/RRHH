<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'requisitos'];


    public function empleados(){
        return $this->hasMany(User::class);
    }

    public function departamento(){
        return $this->belongsTo(Department::class);
    }

    
}
