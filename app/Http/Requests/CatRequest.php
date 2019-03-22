<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nombre' => 'nombre CAT',
            'direccion' => 'dirección',
            'email' => 'correo electronico',
            'departamento_id' => 'departamento',
            'municipio_id' => 'municipio',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:2|max:50',
            'direccion' => 'required|min:2',
            'email' => 'required|max:50',
            'departamento_id' => 'required',
            'municipio_id' => 'required',
            'activo' => 'required'
        ];
    }
}
