<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'cat_articulos';    
    protected $primaryKey = 'id';    
    protected $fillable = ['clave', 'descripcion', 'fecha_baja', 'estatus', 'id_grupo', 'id_unidad'];

    public function catGrupo()
    {
    	return $this->belongsTo('App\Model\Catalogos\GruposAlmacen', 'id_grupo');
    }
    
    public function catUnidad()
    {
    	return $this->belongsTo('App\Model\Catalogos\UnidadesAlmacen', 'id_unidad');
	}

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }
}
