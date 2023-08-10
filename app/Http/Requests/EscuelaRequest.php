<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EscuelaRequest extends FormRequest
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
                Rule::requiredIf( ! $this->route('escuela'))
            ],
            'data.direccion' => [
                'max:180',
                'string',
                Rule::requiredIf( ! $this->route('escuela'))
            ],
            'data.imagen' => [
                'mimes:jpeg,png,jpg',
                'image',
                'max:2048',
                'dimensions:min_width=200,min_height=200',
            ],
            'data.email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('escuelas', 'email')->ignore($this->route('escuela')),
            ],
            'data.telefono' => [
                'regex:/^\d{10}$/',
            ],
            'data.pagina_web' => [
                'url'
            ]
        ];
    }
}
