<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
            'programa_id' => 'programa',
            'nombre'  => 'nombre',
            'perfil' => 'perfil',
            'activo' => 'activo'
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
            'programa_id' => 'required',
            'nombre'  => 'required|min:2|max:50',
            'activo' => 'required'
        ];
    }
}
