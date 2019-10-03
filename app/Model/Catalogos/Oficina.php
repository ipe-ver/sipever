<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'cat_oficinas';    
    protected $primaryKey = 'id';    
    protected $fillable = ['ubpp', 'oficina', 'descricipcion', 'subdir', 'estatus', 'login'];

    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = mb_strtoupper($value,'utf-8');
    }

}
