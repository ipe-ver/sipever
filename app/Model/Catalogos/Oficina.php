<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'cat_oficinas';    
    protected $primaryKey = 'id';    
    protected $fillable = ['clave', 'nombre', 'estatus', 'id_ubpp'];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON VIVIENDA CON ID_TIPOPENSION

    public function catUbpp()
    {
        return $this->belongsTo('App\Model\Catalogos\UBPP', 'id_ubpp');
    }

}
