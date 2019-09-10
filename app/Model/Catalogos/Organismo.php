<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;

class Organismo extends Model
{
    protected $table = 'cat_organismos';    
    protected $primaryKey = 'id';    
    protected $fillable = [
    	'clave', 
    	'tipo', 
    	'nombre', 
    	'titular', 
    	'puesto', 
    	'telefono', 
    	'orgtab', 
    	'fecha_act_nomina',
    	'fecha_incre_pers_conf', 
    	'fecha_incre_pers_base',
    	'porc_cert_pers_conf', 
    	'porc_cert_pers_base', 
        'comprobantes',
        'conveniosfp',
        'referencia',
        'destinatario',
        'cargo',
        'complemento',
        'calle',
        'no_exterior',
        'no_interior',
        'colonia',
        'cp',
        'atentamente',
        'cargo2',
    	'id_estado', 
    	'id_municipio', 
    	'id_localidad', 
    	'estatus'
    ];


    //RELACIONO LA TABLA DE ORGANISMOS CON ESTADO CON ID_ESTADO
    
	public function catEstado()
    {
    	return $this->belongsTo('App\Model\Catalogos\Estado', 'id_estado');
	}

    //RELACIONO LA TABLA DE ORGANISMOS CON MUNICIPIO CON ID_MUNICIPIO

    public function catMunicipio()
    {
        return $this->belongsTo('App\Model\Catalogos\Municipio', 'id_municipio');
    }

    //RELACIONO LA TABLA DE ORGANISMOS CON LOCALIDAD CON ID_LOCALIDAD

	public function catLocalidad()
    {
    	return $this->belongsTo('App\Model\Catalogos\Localidad', 'id_localidad');
	}

    /***********************************************************************************************
    *******************************   Accessors y Mutators *****************************************
    ************************************************************************************************/ 

    public function setTipoAttribute($value)
    {
        $this->attributes['tipo'] = mb_strtoupper($value,'utf-8');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_strtoupper($value,'utf-8');
    }

    public function setTitularAttribute($value)
    {
        $this->attributes['titular'] = mb_strtoupper($value,'utf-8');
    }

    public function setPuestoAttribute($value)
    {
        $this->attributes['puesto'] = mb_strtoupper($value,'utf-8');
    }

    public function setFechaActNominaAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_act_nomina'] = null;
        } else {
            $this->attributes['fecha_act_nomina'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setFechaIncrePersConfAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_incre_pers_conf'] = null;
        } else {
            $this->attributes['fecha_incre_pers_conf'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setFechaIncrePersBaseAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_incre_pers_base'] = null;
        } else {
            $this->attributes['fecha_incre_pers_base'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setComnprobantesAttribute($value)
    {
        $this->attributes['comprobantes'] = mb_strtoupper($value,'utf-8');
    }

    public function setConveniosfpAttribute($value)
    {
        $this->attributes['conveniosfp'] = mb_strtoupper($value,'utf-8');
    }

    public function setReferenciaAttribute($value)
    {
        $this->attributes['referencia'] = mb_strtoupper($value,'utf-8');
    }

    public function setDestinatarioAttribute($value)
    {
        $this->attributes['destinatario'] = mb_strtoupper($value,'utf-8');
    }

    public function setCargoAttribute($value)
    {
        $this->attributes['cargo'] = mb_strtoupper($value,'utf-8');
    }

    public function setComplementoAttribute($value)
    {
        $this->attributes['complemento'] = mb_strtoupper($value,'utf-8');
    }

    public function setCalleAttribute($value)
    {
        $this->attributes['calle'] = mb_strtoupper($value,'utf-8');
    }

    public function setNoExteriorAttribute($value)
    {
        $this->attributes['no_exterior'] = mb_strtoupper($value,'utf-8');
    }

    public function setNoInteriorAttribute($value)
    {
        $this->attributes['no_interior'] = mb_strtoupper($value,'utf-8');
    }

    public function setColoniaAttribute($value)
    {
        $this->attributes['colonia'] = mb_strtoupper($value,'utf-8');
    }

    public function setAtentamenteAttribute($value)
    {
        $this->attributes['atentamente'] = mb_strtoupper($value,'utf-8');
    }

    public function setCargo2Attribute($value)
    {
        $this->attributes['cargo2'] = mb_strtoupper($value,'utf-8');
    }
}
