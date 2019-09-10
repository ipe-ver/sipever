<?php

namespace App\Model\Catalogos;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ActivosPensionados extends Model
{
    protected $table = 'cat_actpen';
    protected $primaryKey = 'id';

    // Datos que tiene permitido el usuario editar.
    protected $fillable = [
        'actpen',
        'fecha_ingreso',
        'numero',
        'paterno',
        'materno',
        'nombre',
        'fecha_nacimiento',
        'sexo',
        'rfc',
        'curp',
        'nss',
        'ine',
        'calle',
        'no_exterior',
        'no_interior',
        'colonia',
        'cp',
        'telefono_fijo',
        'telefono_celular',
        'correo_electronico_personal',
        //'correo_electronico_institucional',
        'comentario',
        'origen',
        'actpen_origen',
        'pagosn',
        'profesion',
        'institucion',
        'contrato',
        'tipo_credencial',
        'numero_credencial',
        'fecha_expedicion',
        'fecha_capturada',
        'fecha_ajustada',
        'fecha_reingreso',
        'notas_titulares',
        'comentarios_homonimia',
        'foto',
        'firma',
        'id_estadocivil',
        'id_situacion',
        'id_vivienda',
        'id_tipopension'
    ];

     protected $appends = ['estadocivil', 'vivienda' ];

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON ESTADO CON ID_ESTADO

	/*public function catEstado()
    {
    	return $this->belongsTo('App\Model\Catalogos\Estado', 'id_estado');
	}*/

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON MUNICIPIO CON ID_MUNICIPIO

    /*public function catMunicipio()
    {
        return $this->belongsTo('App\Model\Catalogos\Municipio', 'id_municipio');
    }*/

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON LOCALIDAD CON ID_LOCALIDAD

	/*public function catLocalidad()
    {
    	return $this->belongsTo('App\Model\Catalogos\Localidad', 'id_localidad');
	}*/

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON ESTADO CIVIL CON ID_ESTADOCIVIL

	public function catEstadoCivil()
    {
    	return $this->belongsTo('App\Model\Catalogos\EstadoCivil', 'id_estadocivil');
	}

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON SITUACION CON ID_SITUACION

	public function catSituacion()
    {
    	return $this->belongsTo('App\Model\Catalogos\Situacion', 'id_situacion');
	}

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON VIVIENDA CON ID_VIVIENDA

	public function catVivienda()
    {
    	return $this->belongsTo('App\Model\Catalogos\Vivienda', 'id_vivienda');
	}

    //RELACIONO LA TABLA DE ACTIVOS Y PENSIONADOS CON VIVIENDA CON ID_TIPOPENSION

    public function catTipoPension()
    {
        return $this->belongsTo('App\Model\Catalogos\TipoPension', 'id_tipopension');
    }


    /***********************************************************************************************
    *******************************   Accessors y Mutators *****************************************
    ************************************************************************************************/  

    

    public function setActPenAttribute($value)
    {
        $this->attributes['actpen'] = mb_strtoupper($value,'utf-8');
    }

    public function setFechaIngresoAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_ingreso'] = null;
        } else {
            $this->attributes['fecha_ingreso'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setPaternoAttribute($value)
    {
        $this->attributes['paterno'] = mb_strtoupper($value,'utf-8');
    }

    public function setMaternoAttribute($value)
    {
        $this->attributes['materno'] = mb_strtoupper($value,'utf-8');
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

    public function setCorreoElectronicoPersonalAttribute($value)
    {
        $this->attributes['correo_electronico_personal'] = mb_strtoupper($value,'utf-8');
    }

   /* public function setCorreoElectronicoInstitucionalAttribute($value)
    {
        $this->attributes['correo_electronico_institucional'] = mb_strtoupper($value,'utf-8');
    }*/

    public function setComentarioAttribute($value)
    {
        $this->attributes['comentario'] = mb_strtoupper($value,'utf-8');
    }

    public function setActPenOrigenAttribute($value)
    {
        $this->attributes['actpen_origen'] = mb_strtoupper($value,'utf-8');
    }

    public function setPagosnAttribute($value)
    {
        $this->attributes['pagosn'] = mb_strtoupper($value,'utf-8');
    }

    public function setProfesionAttribute($value)
    {
        $this->attributes['profesion'] = mb_strtoupper($value,'utf-8');
    }

    public function setInstitucionAttribute($value)
    {
        $this->attributes['institucion'] = mb_strtoupper($value,'utf-8');
    }

    public function setTipoCredencialAttribute($value)
    {
        $this->attributes['tipo_credencial'] = mb_strtoupper($value,'utf-8');
    }

    public function setFechaExpedicionAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_expedicion'] = null;
        } else {
            $this->attributes['fecha_expedicion'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setFechaCapturadaAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_capturada'] = null;
        } else {
            $this->attributes['fecha_capturada'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setFechaAjustadaAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_ajustada'] = null;
        } else {
            $this->attributes['fecha_ajustada'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setFechaReingresoAttribute($value)
    {
        if(empty($value)){
            $this->attributes['fecha_reingreso'] = null;
        } else {
            $this->attributes['fecha_reingreso'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d 00:00:00');
        }
    }

    public function setNotasTitularesAttribute($value)
    {
        $this->attributes['notas_titulares'] = mb_strtoupper($value,'utf-8');
    }

    public function setComentariosHomonimiaAttribute($value)
    {
        $this->attributes['comentarios_homonimia'] = mb_strtoupper($value,'utf-8');
    }

    public function getFechaIngresoAttribute($value)
    {
      return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getFechaNacimientoAttribute($value)
    {
      return  \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getNssAttribute($value)
    {
        return (is_null($this->attributes['nss'])) ?  0 : $this->attributes['nss'] = mb_strtoupper($value,'utf-8');
    }

    public function getIneAttribute($value)
    {
        return (is_null($this->attributes['ine'])) ?  0 : $this->attributes['ine'] = mb_strtoupper($value,'utf-8');
    }

    public function getEstadoCivilAttribute()
    {
      return (is_null($this->catEstadoCivil)) ?  '' : $this->catEstadoCivil->nombre;
    }

     public function getViviendaAttribute()
    {
      return (is_null($this->catVivienda)) ?  '' : $this->catVivienda->nombre;
    }

    public function getCpAttribute($value)
    {
        return (is_null($this->attributes['cp'])) ?  0 : $this->attributes['cp'] = mb_strtoupper($value,'utf-8');
    }
}


