<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Catalogos\Organismo;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function import()
    {
    	Excel::load('public'.DIRECTORY_SEPARATOR.'seed_xls'.DIRECTORY_SEPARATOR.'cat_organismos.xlsx', function($reader) {
 
            foreach ($reader->get() as $organismo) {
                Organismo::create([
                'id' => $organismo->id,
                'clave' =>$organismo->clave,
                'tipo' =>$organismo->tipo,
                'nombre' =>$organismo->nombre,
                'titular' =>$organismo->titular,
                'puesto' =>$organismo->puesto,
                'telefono' =>$organismo->telefono,
                'orgtab' =>$organismo->orgtab,
                'fecha_act_nomina' =>$organismo->fecha_act_nomina,
                'fecha_incre_pers_conf' =>$organismo->fecha_incre_pers_conf,
                'fecha_incre_pers_base' =>$organismo->fecha_incre_pers_base,
                'porc_cert_pers_conf' =>$organismo->porc_cert_pers_conf,
                'porc_cert_pers_base' =>$organismo->porc_cert_pers_base,
                'comprobantes' =>$organismo->comprobantes,
                'conveniosfp' =>$organismo->conveniosfp,
                'referencia' =>$organismo->referencia,
                'destinatario' =>$organismo->destinatario,
                'cargo' =>$organismo->cargo,
                'complemento' =>$organismo->complemento,
                'calle' =>$organismo->calle,
                'no_exterior' =>$organismo->no_exterior,
                'no_interior' =>$organismo->no_interior,
                'colonia' =>$organismo->colonia,
                'cp' =>$organismo->cp,
                'atentamente' =>$organismo->atentamente,
                'cargo2' =>$organismo->cargo2,
                'estatus' =>$organismo->estatus,
                'id_estado' =>$organismo->id_estado,
                'id_municipio' =>$organismo->id_municipio,
                'id_localidad' =>$organismo->id_localidad
                ]);
            }
        });
        return Organismo::all();
    }
}


