<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

//Request
use App\Http\Requests\ConvocatoriaRequest;

class ConvocatoriaRequest extends FormRequest
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
            'descripcion' => 'descripción',
            'fecha_inicio' => 'fecha de inicio',
            'fecha_finalizacion' => 'fecha de finalización',
            'activa' => 'estado',
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
            'descripcion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_finalizacion' => 'required',
            'activa' => 'required',
        ];
    }
}
