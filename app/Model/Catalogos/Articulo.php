<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'cat_articulos';    
    protected $primaryKey = 'id';    
    protected $fillable = ['clave', 'descripcion', 'fecha_baja', 'estatus', 'stock_minimo', 'stock_maximo',
                            'existencias', 'precio_unitario', 'id_cuenta', 'id_unidad'];

    public function catCuenta()
    {
    	return $this->belongsTo('App\Model\Catalogos\CuentaContable', 'id_cuenta');
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
