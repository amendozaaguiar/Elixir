<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class User_Detail extends Model implements Auditable
{
    //Auditoria
    use \OwenIt\Auditing\Auditable;

    //Tabla
    protected $table = 'users_detail';

    //Campos accesibles
    protected $fillable = [
        'user_id', 
        'tipo_documento_id', 
        'numero_documento', 
        'primer_nombre', 
        'segundo_nombre', 
        'primer_apellido', 
        'segundo_apellido',
    ];

    //Datos principales del usuario
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    //Tipos de documento
    function tipoDocumento()
    {
        return $this->hasOne(TiposDocumento::class, 'id', 'tipo_documento_id');
    }

}
