<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;

class EscuelaController extends Controller
{
    public function index(){
        $escuelas = Escuela::query()
        ->allowedIncludes(['alumnos'])
        ->jsonPaginate();

        return $escuelas;
    }
}
