<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlumnoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'data.nombre' => [
                'max:180',
                'string',
                Rule::requiredIf( ! $this->route('alumno'))
            ],
            'data.apellidos' => [
                'max:180',
                'string',
                Rule::requiredIf( ! $this->route('alumno'))
            ],
            'data.fecha_nacimiento' => [
                'date_format:Y-m-d',
                'date',
                Rule::requiredIf( ! $this->route('alumno'))
            ],
            'data.ciudad_natal' => ['string','max:180'],
            'data.escuela_id' => [
                Rule::requiredIf( ! $this->route('alumno')),
                Rule::exists('escuelas', 'id'),
            ]

        ];
    }
}
