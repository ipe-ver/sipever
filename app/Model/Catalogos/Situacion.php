<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Situacion extends Model
{
    protected $table = 'cat_situaciones';    
    protected $primaryKey = 'id';    
    protected $fillable = ['clave', 'nombre', 'estatus'];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }
}
