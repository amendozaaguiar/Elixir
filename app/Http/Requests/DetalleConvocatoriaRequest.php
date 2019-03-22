<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleConvocatoriaRequest extends FormRequest
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
            'convocatoria' => 'convocatoria',
            'cat_id'  => 'CAT',
            'programa_id' => 'programa',
            'curso_id' => 'curso',
            'perfil' => 'perfil',
            'requisitos' => 'requisitos',
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
            'cat_id'  => 'required',
            'programa_id' => 'required',
            'curso_id' => 'required',
            'perfil' => 'required|min:2',
            'requisitos' => 'required|min:2',
        ];
    }
}
