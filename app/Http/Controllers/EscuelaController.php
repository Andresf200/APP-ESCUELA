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

    public function show($id){
        $escula = Escuela::where('id', $id)
        ->allowedIncludes(['alumnos'])
        ->firstOrFail();

        return EscuelaResource::make($escula);
    }

    public function destroy(Escuela $escuela){
        $escuela->delete();
        return response()->json(["status" => 200, "message" => "Escuela eliminada con exito"]);
    }
}
