<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use File;
use DB;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = DB::select("call sp_obtener_departamentos");
        return view('almacen.reportes', compact('departamentos'));
    }

    /**
     * Obtiene las oficinas asociadas a un departamento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getOficinas(Request $request){
        $ubpp = $request->input('ubpp');
        $oficinas = DB::select("call sp_obtener_oficinas(?)", array($ubpp));
        return json_encode($oficinas);
    }

    /**
     * Obtiene las oficinas asociadas a un departamento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generarReporte(Request $request){
        set_time_limit(0);
        $validConsumo = $request->input('validConsumo');
        $consDepto = $request->input('consDepto');
        $auxAlmacen = $request->input('auxAlmacen');
        $consArticulo = $request->input('consArticulo');
        $existencias = $request->input('existencias');
        $compArticulo = $request->input('compArticulo');
        $existArticulo = $request->input('existArticulo');
        $consAreaArt = $request->input('consAreaArt');
        $numMesInicio = $request->input('numMesInicio');
        $yearInicio = $request->input('yearInicio');
        $periodo = $request->has('mesFin') && $request->has('yearFin') ? true : false;
        $mesIni = $this->nombre_mes($numMesInicio);
        $ruta = "";
        $headers = [];
        if($periodo){
            $mesFin = $request->input('mesFin');
            $yearFin = $request->input('yearFin');
            $mesF = $this->nombre_mes($mesFin);
            if($mesFin < $numMesInicio || $yearFin < $yearInicio){
                return back()->with('warning','Las fechas ingresadas no son correctas');
            }
        }

        if ($validConsumo == "checked"){
            $mensaje = 'Reporte para validación de consumos';
            $ruta = "almacen.reportes.reporte_validacion_cons";
        }elseif ($consDepto == "checked") {
            $mensaje = 'Reporte de consumos por departamento';
            $ruta = "almacen.reportes.reporte_consumos_depto";
        }elseif ($auxAlmacen == "checked"){
            $mensaje = 'Reporte auxiliar de almacén';
            $ruta = "almacen.reportes.reporte_auxiliar";
        }elseif ($existencias == "checked"){
            $mensaje = 'Reporte final de existencias';
            $ruta = "almacen.reportes.reporte_final_existencias";
            $headers = ['CODIFICACIÓN', 'DESCRIPCIÓN', 'UNIDAD', 'CANT.', 'COSTO', 'IMPORTE'];
        }elseif ($consArticulo == "checked"){
            $mensaje = 'Concentrado de consumos por artículo';
            $ruta = "almacen.reportes.cons_p_articulo";
        }elseif ($compArticulo == "checked"){
            $mensaje = 'Concentrado de compras por artículo';
            $ruta = "almacen.reportes.compras_p_articulo";
        }elseif ($existArticulo == "checked"){
            $mensaje = 'Concentrado de existencias por artículo';
            $ruta = "almacen.reportes.existencias_p_articulo";
        }elseif ($consAreaArt == "checked"){
            $mensaje = 'Concentrado de consumos por área y artículo';
            $ruta = "almacen.reportes.consumos_p_area";
        }else{
           return back()->with('warning',"Porfavor seleccione un tipo de reporte");
        }

        if($periodo){
            $mensaje = "{$mensaje} del mes de {$mesIni} de {$yearInicio} al mes de {$mesF} de {$yearFin}";
        }else{
            $mensaje = "{$mensaje} correspondiente al mes de {$mesIni} de {$yearInicio}";
        }

        $archivo = file_get_contents(public_path("/img_system/banner_principal.png"));
        $imagen_b64 = base64_encode($archivo);
        $logo_b64 = "data:image/png;base64,{$imagen_b64}";
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("d/M/Y");
        $hora = date("h:i a");
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($ruta,compact('mensaje','fecha','hora','logo_b64', 'headers'));

        return $pdf->stream('reporte.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function nombre_mes($no_mes){
        $mes="";
        switch ($no_mes) {
            case 1:
                $mes = "enero";
                break;
            case 2:
                $mes = "febrero";
                break;
            case 3:
                $mes = "marzo";
                break;
            case 4:
                $mes = "abril";
                break;
            case 5:
                $mes = "mayo";
                break;
            case 6:
                $mes = "junio";
                break;
            case 7:
                $mes = "julio";
                break;
            case 8:
                $mes = "agosto";
                break;
            case 9:
                $mes = "septiembre";
                break;
            case 10:
                $mes = "octubre";
                break;
            case 11:
                $mes = "noviembre";
                break;
            case 12:
                $mes = "diciembre";
                break;
            default:
                $mes = "";
                break;
        }
        return $mes;
    }
}