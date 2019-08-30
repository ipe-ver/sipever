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
        'fecha_nacimiento',
        'sexo',
        'rfc',
        'curp',
        'nss',
        'calle',
        'no_exterior',
        'no_interior',
        'colonia',
        'cp',
        'telefono_fijo',
        'telefono_celular',
        'correo_electronico',
        'estatus',
    ];

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

    public function setFechaNacimientoAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_nacimiento'] = null;
        } else {
            $this->attributes['fecha_nacimiento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setSexoAttribute($value)
    {
        $this->attributes['sexo'] = mb_strtoupper($value,'utf-8');
    }

    public function setRfcAttribute($value)
    {
        $this->attributes['rfc'] = mb_strtoupper($value,'utf-8');
    }

    public function setCurpAttribute($value)
    {
        $this->attributes['curp'] = mb_strtoupper($value,'utf-8');
    }

    public function setCalleAttribute($value)
    {
        $this->attributes['calle'] = mb_strtoupper($value,'utf-8');
    }

    public function setColoniaAttribute($value)
    {
        $this->attributes['colonia'] = mb_strtoupper($value,'utf-8');
    }

   
}
