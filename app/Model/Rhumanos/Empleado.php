<?php

namespace App\Model\Rhumanos;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Empleado extends Model
{
    protected $table = 'rch_empleados';
    protected $primaryKey = 'id';

    // Datos que tiene permitido el usuario editar.
    protected $fillable = [
        'no_personal',
        'fecha_ingreso',
        'apellido_paterno',
        'apellido_materno',
        'nombre',
        'estatus',
    ];

    

    protected $appends = ['nombre_completo'];   

     /**************** ACCESSORS Y MUTATORS *************************/   

    public function setFechaIngresoAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_ingreso'] = null;
        } else {
            $this->attributes['fecha_ingreso'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }
    
    public function setApellidoPaternoAttribute($value)
    {
        $this->attributes['apellido_paterno'] = mb_strtoupper($value,'utf-8');
    }

    public function setApellidoMaternoAttribute($value)
    {
        $this->attributes['apellido_materno'] = mb_strtoupper($value,'utf-8');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function getNombreCompletoAttribute()
	{
		$nombre = $this->primer_apellido.' '.$this->segundo_apellido.' '.$this->nombres;		
		return $nombre;
    }

   
}
