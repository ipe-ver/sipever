<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class GruposAlmacen extends Model
{
    protected $table = 'cat_grupos_almacen';    
    protected $primaryKey = 'id';    
    protected $fillable = ['clave', 'descripcion', 'estatus'];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = mb_strtoupper($value,'utf-8');
    }
}
