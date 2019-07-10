<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Models\Audit as AuditModel;

class Audits extends AuditModel
{
    //Datos principales del usuario
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
