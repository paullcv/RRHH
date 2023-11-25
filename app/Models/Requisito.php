<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
    use HasFactory;
   
    protected $fillable = ['conocimientos', 'experiencia', 'cargo_id'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }
}
