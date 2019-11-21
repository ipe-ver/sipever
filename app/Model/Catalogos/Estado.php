<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'cat_estados';

    protected $primaryKey = 'id';
    
    protected $fillable = ['abreviatura', 'nombre', 'renapo'];


    /***********************************************************************************************
    *******************************   Accessors y Mutators *****************************************
    ************************************************************************************************/    

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function setAbreviaturaAttribute($value)
    {
        $this->attributes['abreviatura'] = mb_strtoupper($value,'utf-8');
    }

    public function setRenapoAttribute($value)
    {
        $this->attributes['renapo'] = mb_strtoupper($value,'utf-8');
    }
}




