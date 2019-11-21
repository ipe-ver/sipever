<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'cat_municipios';

    protected $primaryKey = 'id';
    
    protected $fillable = ['clave', 'nombre', 'abrev', 'id_estado'];

	public function setNombreAttribute($value)
	{
		$this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }
    
	public function setAbrevAttribute($value)
	{
		$this->attributes['abrev'] = mb_strtoupper($value,'utf-8');
	}
}
