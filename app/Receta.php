<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes','imagen','categoria_id',
    ];

    // Obtiene la categoria de la receta via FK

    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }
}
