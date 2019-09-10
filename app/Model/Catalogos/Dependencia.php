<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    protected $table = 'cat_dependencias';    
    protected $primaryKey = 'id';    
    protected $fillable = [
    	'clave', 
    	'nombre', 
    	'depenact', 
    	'estatus', 
    	'id_organismo'
    ];

    //RELACIONA LA TABLA DE DEPENDENCIAS CON ORGANISMO CON EL ID_ORGANISMO

    public function catOrganismo()
    {
    	return $this->belongsTo('App\Model\Catalogos\Organismo', 'id_organismo');
	}

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function setDepenactAttribute($value)
    {
        $this->attributes['depenact'] = mb_strtoupper($value,'utf-8');
    }
}
