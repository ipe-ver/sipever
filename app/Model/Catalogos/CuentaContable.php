<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class CuentaContable extends Model
{
    protected $table = 'cat_cuentas_contables';    
    protected $primaryKey = 'id';    
    protected $fillable = [
    	'cta', 
    	'scta', 
        'sscta', 
        'nombre', 
        'ctaarmo', 
        'nomarmo', 
        'grupo', 
        'estatus', 
    ];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function setNomArmoAttribute($value)
    {
        $this->attributes['nomarmo'] = mb_strtoupper($value,'utf-8');
    }

    public function setGrupoAttribute($value)
    {
        $this->attributes['grupo'] = mb_strtoupper($value,'utf-8');
    }
}
