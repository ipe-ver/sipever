<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'cat_proveedores';    
    protected $primaryKey = 'id';    
    protected $fillable = ['no_proveedor', 
                            'rfc',
                            'nombre',
                            'calle',
                            'numero', 
                            'colonia', 
                            'cp', 
                            'ciudad', 
                            'estado',
                            'telefono', 
                            'ext', 
                            'fax',
                            'celular',
                            'correo_electronico',
                            'estatus'];

    public function setRfcAttribute($value)
    {
        $this->attributes['rfc'] = mb_strtoupper($value,'utf-8');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function setCalleAttribute($value)
    {
        $this->attributes['calle'] = mb_strtoupper($value,'utf-8');
    }

    public function setColoniaAttribute($value)
    {
        $this->attributes['colonia'] = mb_strtoupper($value,'utf-8');
    }

    public function setCiudadAttribute($value)
    {
        $this->attributes['ciudad'] = mb_strtoupper($value,'utf-8');
    }

    public function setEstadoAttribute($value)
    {
        $this->attributes['estado'] = mb_strtoupper($value,'utf-8');
    }
}
