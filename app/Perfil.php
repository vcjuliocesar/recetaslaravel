<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //relacion 1:1 perfil usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
