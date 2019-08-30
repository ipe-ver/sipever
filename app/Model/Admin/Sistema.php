<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    protected $table = 'cat_sistemas';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre', 'estatus'];
    

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function catEstadoCivil()
    {
    	return $this->belongsTo('App\Model\Catalogos\EstadoCivil', 'id_estadocivil');
	}
}
