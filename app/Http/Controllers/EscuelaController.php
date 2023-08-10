<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Escuela;
use App\Http\Resources\EscuelaResource;
use App\Http\Requests\EscuelaRequest;

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

    public function store(EscuelaRequest $request){

        $fileName = '';
        $path = '';

        if($request->hasFile('data.imagen')){
                $file = $request->file('data.imagen');
                $fileName = 'imagen_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('imagenes', $fileName, 'public');
        }


        $escuela = Escuela::make([
            'nombre' => $request->input('data.nombre'),
            'direccion' => $request->input('data.direccion'),
            'path_logotipo' => $path,
            'name_logotipo' => $fileName,
            'email' => $request->input('data.email'),
            'telefono' => $request->input('data.telefono'),
            'pagina_web' => $request->input('data.pagina_web')
        ]);

        $escuela->save();

        return EscuelaResource::make($escuela);
    }

    public function update(Escuela $escuela,EscuelaRequest $request) {


        $fileName = $escuela->name_logotipo;
        $path = $escuela->path_logotipo;

        if ($request->hasFile('data.imagen')) {
            $file = $request->file('data.imagen');
            $fileName = 'imagen_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('imagenes', $fileName, 'public');
        }


        if ($request->hasFile('data.imagen')) {
            $escuela->path_logotipo = $path.'/public';
            $escuela->name_logotipo = $fileName;
        }

        $escuela->fill([
            'nombre' => $request->input('data.nombre')? $request->input('data.nombre') : $escuela->nombre,
            'direccion' => $request->input('data.direccion') ? $request->input('data.direccion') : $escuela->direccion,
            'path_logotipo' => $path,
            'name_logotipo' => $fileName,
            'email' => $request->input('data.email'),
            'telefono' => $request->input('data.telefono'),
            'pagina_web' => $request->input('data.pagina_web')
        ]);


       if($escuela->isClean()){
        return response()->json(['status' => 422,'message' => "Debe especificar al menos un valor diferente para actualizar"]);
    }

        $escuela->save();

        return EscuelaResource::make($escuela);
    }

    public function destroy(Escuela $escuela){
        $escuela->delete();
        return response()->json(["status" => 200, "message" => "Escuela eliminada con exito"]);
    }
}
