<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class TipoPension extends Model
{
    protected $table = 'cat_tipos_pensiones';    
    protected $primaryKey = 'id';    
    protected $fillable = ['nombre', 'estatus'];

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }
}
