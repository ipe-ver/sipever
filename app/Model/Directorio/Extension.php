<?php

namespace App\Model\Directorio;

use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $table = 'cat_extensiones';    
    protected $primaryKey = 'id';    
    protected $fillable = ['extension', 'telefono', 'descripcion', 'estatus'];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = mb_strtoupper($value,'utf-8');
    }

}
