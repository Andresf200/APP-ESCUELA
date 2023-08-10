<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Http\Resources\EscuelaResource;

class EscuelaController extends Controller
{
    public function index(){
        $escuelas = Escuela::query()
        ->allowedIncludes(['alumnos'])
        ->jsonPaginate();

        return EscuelaResource::collection($escuelas);
    }
}
