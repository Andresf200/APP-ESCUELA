<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;
use Illuminate\Http\Request;
use App\Http\Resources\AlumnoResource;
use App\Http\Requests\AlumnoRequest;

class AlumnoController extends Controller
{
    public function index(){
        $alumno = Alumnos::query()
        ->allowedIncludes(['escuela'])
        ->jsonPaginate();

        return AlumnoResource::collection($alumno);
    }

    public function show($id){
        $alumno = Alumnos::where('id', $id)
        ->allowedIncludes(['escuela'])
        ->firstOrFail();

        return AlumnoResource::make($alumno);
    }

    public function store(AlumnoRequest $request){
        $alumno = Alumnos::make([
            'nombre' => $request->input('data.nombre'),
            'apellidos' => $request->input('data.apellidos'),
            'fecha_nacimiento' => $request->input('data.fecha_nacimiento'),
            'ciudad_natal' => $request->input('data.ciudad_natal'),
            'escuela_id' => $request->input('data.escuela_id'),
        ]);

        $alumno->save();

        return AlumnoResource::make($alumno);
    }

    public function update(Alumnos $alumno, AlumnoRequest $request){
        $alumno->fill([
            'nombre' => $request->input('data.nombre'),
            'apellidos' => $request->input('data.apellidos'),
            'fecha_nacimiento' => $request->input('data.fecha_nacimiento'),
            'ciudad_natal' => $request->input('data.ciudad_natal'),
            'escuela_id' => $request->input('data.escuela_id'),
        ]);

        if($alumno->isClean()){
            return response()->json(['status' => 422,'message' => "Debe especificar al menos un valor diferente para actualizar"]);
        }

        $alumno->save();
        return AlumnoResource::make($alumno);
    }
    public function destroy(Alumnos $alumno){
        $alumno->delete();
        return response()->json(["status" => 200, "message" => "Alumno eliminada con exito"]);
    }
}
