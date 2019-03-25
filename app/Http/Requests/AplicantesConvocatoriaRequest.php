<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AplicantesConvocatoriaRequest extends FormRequest
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
            'hoja_vida' => 'anexar hoja de vida',
            'pre_seleccionado' => 'Pre-Seleccionado',
            'observaciones' => 'observaciones',
            'fecha_hora_presentacion' => 'fecha y hora de presentacion',
            'temas_presentacion' => 'temas de presentacion',
            'lugar_presentacion' => 'lugar de presentacion',
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
            'hoja_vida' => 'required|mimes:pdf',
        ];
    }
}
