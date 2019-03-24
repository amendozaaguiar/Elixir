<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_Detail extends Model
{
    //Eliminacion logica
    use SoftDeletes;
    
    protected $table = 'users_detail';

    protected $fillable = [
        'user_id', 
        'tipo_documento_id', 
        'numero_documento', 
        'primer_nombre', 
        'segundo_nombre', 
        'primer_apellido', 
        'segundo_apellido',
    ];

    //Dato principal del usuario
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //Tipo de documento
    function tipoDocumento(){
        return $this->hasOne(TiposDocumento::class, 'id', 'tipo_documento_id');
    }

}
