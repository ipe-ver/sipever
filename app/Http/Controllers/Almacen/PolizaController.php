<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use DB;
class PolizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = DB::select('SELECT DISTINCT anio FROM periodos');
        return view('almacen.polizas', compact('years'));
    }

    /**
     * Método par ala generación de poliza
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function generarPoliza(Request $request){
        $almacen = $request->input('almacen');
        $conta = $request->input('conta');
        $no_mes = $request->input('numMes');
        $anio = $request->input('year');

        $mes_nombre = $this->nombre_mes($no_mes);
        $ruta = "";
        $headers = [];
        $mensaje = "";
        $nombre_archivo="";

        if($almacen == "checked"){
            $mensaje = "Poliza de almacén";
            $nombre_archivo="POLIZALMAC";
            $ruta = "almacen.polizas.poliza_almacen";
        }elseif($conta == "checked"){
            $mensaje="Poliza para contabilidad y presupuesto";
            $nombre_archivo="POLIZACONTPRESUP";
            $ruta = "almacen.polizas.contabilidad_presup";
        }else{
            return back()->with('warning',"Porfavor seleccione un tipo de poliza");
        }

        $mensaje = "{$mensaje} correspondiente al mes de {$mes_nombre} de {$anio}";

        date_default_timezone_set('America/Mexico_City');
        $fecha_nombre=date("Ymd");
        $hora_nombre=date("Hi");
        $nombre_archivo = "{$fecha_nombre}_{$nombre_archivo}_{$hora_nombre}";

        $archivo = file_get_contents(public_path("/img_system/banner_principal.png"));
        $imagen_b64 = base64_encode($archivo);
        $logo_b64 = "data:image/png;base64,{$imagen_b64}";

        $fecha = date("d/M/Y");
        $hora = date("h:i a");
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($ruta,compact('mensaje','fecha','hora','logo_b64', 'headers'));

        return $pdf->stream($nombre_archivo);
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
