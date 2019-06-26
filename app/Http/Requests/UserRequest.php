<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'detail.tipo_documento_id' => 'Tipo de documento',
            'detail.numero_documento'  => 'Numero de documento',
            'detail.primer_nombre'     => 'Primer nombre',
            'detail.primer_apellido'   => 'Primer apellido',
            'password'          => 'Contraseña',
            'password_confirm'  => 'Confirmacion de contraseña',            
            'email'             => 'Correo electronico',  
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
            'detail.tipo_documento_id' => 'required',
            'detail.numero_documento' => 'required|min:2',
            'detail.primer_nombre'     => 'required|min:2|max:25',
            'detail.primer_apellido'   => 'required|min:2|max:25',
            'password'          => 'required|min:8',
            'password_confirm'  => 'required',            
            'email'             => 'required|email|unique:users',            
        ];
    }


}
