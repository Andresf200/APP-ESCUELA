<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\JsonApi\Traits\JsonApiResource;


class EscuelaResource extends JsonResource
{
    use JsonApiResource;

    public function toJsonApi(): array
    {
        return [
            'id' => $this->resource->id,
            'nombre' => $this->resource->nombre,
            'direccion' => $this->resource->direccion,
            'path_logotipo' => $this->resource->path_logotipo,
            'name_logotipo' => $this->resource->name_logotipo,
            'email' => $this->resource->email,
            'telefono' => $this->resource->telefono,
            'pagina_web' => $this->resource->pagina_web
        ];
    }

    public function getIncludes():array
    {
        return [
//            'alumnos' => AlumnosResource::collection($this->whenLoaded('alumnos'))
        ];
    }
}
