<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    protected $fillable = [
            'nombre',
            'apellidos',
            'ciudad',
            'fecha_nacimiento',
            'ciudad_natal',
            'escuela_id'
    ];

    public function escuela(){
        return $this->belongsTo(Escuela::class,'escuela_id','id');
    }
}
