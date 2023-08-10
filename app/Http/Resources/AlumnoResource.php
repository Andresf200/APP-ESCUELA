<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\JsonApi\Traits\JsonApiResource;
use App\Http\Resources\EscuelaResource;

class AlumnoResource extends JsonResource
{
    use JsonApiResource;

    public function toJsonApi(): array
    {
        return [
            'id' => $this->resource->id,
            'nombre' => $this->resource->nombre,
            'apellidos' => $this->resource->apellidos,
            'fecha_nacimiento' => $this->resource->fecha_nacimiento,
            'ciudad_natal' => $this->resource->ciudad_natal,
            'escuela_id' => $this->resource->escuela_id,
        ];
    }

    public function getIncludes():array
    {
        return [
            'escuela' => EscuelaResource::make($this->whenLoaded('escuela'))
        ];
    }
}
