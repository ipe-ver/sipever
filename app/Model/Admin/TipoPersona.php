<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class TipoPersona extends Model
{
    protected $table = 'cat_tipos_persona';    
    protected $primaryKey = 'id';    
    protected $fillable = ['modelo', 'nombre', 'descripcion'];

	public function setNombreAttribute($value)
	{
		$this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
	}
}
