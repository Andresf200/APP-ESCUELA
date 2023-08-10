<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'path_logotipo',
        'name_logotipo',
        'email',
        'telefono',
        'pagina_web'
    ];

    public function alumnos(){
        return $this->hasMany(Alumnos::class,'escuela_id','id');
    }
}

