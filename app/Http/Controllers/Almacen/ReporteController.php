<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\PDOConnection;
use Illuminate\Database\QueryException;
use Exception;
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
        $years = DB::select('SELECT DISTINCT anio FROM periodos');
        $departamentos = DB::select("call sp_obtener_departamentos");
        return view('almacen.reportes', compact('departamentos', 'years'));
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
        $office_code = $request->cookie('__office_session');
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
        $depto = $request->has('depto') ? $request->depto : null;
        $oficina = $request->has('oficina') ? $request->oficina : null;
        $ruta = "";
        $headers = [];
        $nombre_archivo="";
        $db = DB::connection()->getPdo();
        //Establecemos la conexión
        $db->setAttribute(PDOConnection::ATTR_ERRMODE, PDOConnection::ERRMODE_EXCEPTION);
        $db->setAttribute(PDOConnection::ATTR_EMULATE_PREPARES, true);
        $query = null;
        if($periodo){
            $mesFin = $request->input('mesFin');
            $yearFin = $request->input('yearFin');
            $mesF = $this->nombre_mes($mesFin);
            if($mesFin < $numMesInicio || $yearFin < $yearInicio){
                return back()->with('warning','Las fechas ingresadas no son correctas');
            }
        }
        $papel = null;
        $orientacion= null;

        if ($validConsumo == "checked"){
            $mensaje = 'Reporte para validación de consumos';
            $nombre_archivo="REPVALIDCONS";
            $ruta = "almacen.reportes.reporte_validacion_cons";
            $papel = 'letter';
            $orientacion='portrait';
            $headers = ['FOLIO.','CUENTA CODIF.', 'DESCRIPCIÓN', 'UNIDAD', 'CANT.', 'COSTO', 'IMPORTE'];
        }elseif ($consDepto == "checked") {
            $mensaje = 'Reporte de consumos por departamento';
            $nombre_archivo="REPCONSDEPTO";
            $ruta = "almacen.reportes.reporte_consumos_depto";
            $headers=['FOLIO','CODIF.','DESCRIPCION','UNIDAD','CANT.','COSTO UNIT.','IMPORTE'];
            $papel = 'letter';
            $orientacion='landscape';
        }elseif ($auxAlmacen == "checked"){
            $mensaje = 'Reporte auxiliar de almacén general';
            $nombre_archivo="REPAUXALM";
            $ruta = "almacen.reportes.reporte_auxiliar";
            $headers=['CODIF.','DESCRIPCION','UNIDAD','CANT.','COSTO UNIT.','IMPORTE', 'INV. FIN'];
            $papel = 'letter';
            $orientacion='portrait';
        }elseif ($existencias == "checked"){
            $mensaje = 'Reporte final de existencias';
            $nombre_archivo="REPFINALEXIST";
            $ruta = "almacen.reportes.reporte_final_existencias";
            $headers = ['CODIF.', 'DESCRIPCIÓN', 'UNIDAD', 'CANT.', 'COSTO', 'IMPORTE'];
            $papel = 'letter';
            $orientacion='portrait';
        }elseif ($consArticulo == "checked"){
            $mensaje = 'Concentrado de consumos por artículo';
            $nombre_archivo="CONCENTCONSARTI";
            $ruta = "almacen.reportes.cons_p_articulo";
            $headers = ['CODIF.', 'DESCRIPCIÓN', 'UNIDAD', 'ENE. ', 'FEB. ', 'MAR. ', 'ABR. ', 'MAY. ', 'JUN. ', 'JUL. ', 'AGO. ', 'SEPT.', 'OCT.', 'NOV.','DIC.', 'TOT. DEL AÑO'];
            $papel = 'legal';
            $orientacion='landscape';
        }elseif ($compArticulo == "checked"){
            $mensaje = 'Concentrado de compras por artículo';
            $nombre_archivo="CONCENTCOMPART";
            $ruta = "almacen.reportes.compras_p_articulo";
            if($mesIni > 6) {
                $headers = ['CODIF.', 'DESCRIPCIÓN','JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE', 'TOTAL SEMESTRAL'];
            }else{
                $headers = ['CODIF.', 'DESCRIPCIÓN', 'ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO','JUNIO', 'TOTAL SEMESTRAL'];
            }
            $papel = 'legal';
            $orientacion='landscape';
        }elseif ($existArticulo == "checked"){
            $mensaje = 'Concentrado de existencias por artículo';
            $nombre_archivo="CONCENTEXISTART";
            $ruta = "almacen.reportes.existencias_p_articulo";
            //Preparamos la llamada al procedimiento remoto
            //$query = $db->prepare('CALL sp_concentrado_existencias(?,?,?)');
            $headers = ['CODIF.', 'DESCRIPCIÓN', 'UNIDAD', 'ENE. ', 'FEB. ', 'MAR. ', 'ABR. ', 'MAY. ', 'JUN. ', 'JUL. ', 'AGO. ', 'SEPT.', 'OCT.', 'NOV.','DIC.', 'TOT. DEL AÑO'];
            $papel = 'legal';
            $orientacion='landscape';
        }elseif ($consAreaArt == "checked"){
            $mensaje = 'Concentrado de consumos por área y artículo';
            $nombre_archivo="CONCENTCONSAART";
            $ruta = "almacen.reportes.consumos_p_area";
            $headers = ['CODIF.', 'DESCRIPCIÓN', 'UNIDAD', 'ENE. ', 'FEB. ', 'MAR. ', 'ABR. ', 'MAY. ', 'JUN. ', 'JUL. ', 'AGO. ', 'SEPT.', 'OCT.', 'NOV.','DIC.', 'TOT. DEL AÑO'];
            $papel = 'legal';
            $orientacion='landscape';
        }else{
           return back()->with('warning',"Porfavor seleccione un tipo de reporte");
        }

        if($periodo){
            $mensaje = "{$mensaje} del mes de {$mesIni} de {$yearInicio} al mes de {$mesF} de {$yearFin}";
        }else{
            $mensaje = "{$mensaje} correspondiente al mes de {$mesIni} de {$yearInicio}";
        }

        if($query){
            dd('Haciendo la query');
            //Hacemos un binding de los parámetros, así protegemos nuestra
            //llamada de una posible inyección sql
            $query->bindParam(1,$numMesInicio);
            if ($periodo) {
                $query->bindParam(2,$mesFin);
            }else{
                $query->bindParam(2,$numMesInicio);
            }
            $query->bindParam(3, $yearInicio);
        }

        if($query){
            try {
                $query->execute();
                $query->closeCursor();
                //accedemos al valor de retorno para regresar la vista correspondiente.
                $results = $query->fetch(PDOConnection::FETCH_OBJ);
            } catch (Exception $e) {
                throw new QueryException("Error Processing Request", 1);
                
            }
        }

        date_default_timezone_set('America/Mexico_City');
        $fecha_nombre=date("Ymd");
        $hora_nombre=date("Hi");
        $nombre_archivo = "{$fecha_nombre}_{$nombre_archivo}_{$hora_nombre}";
        $tipo = 'reporte';
        $archivo = file_get_contents(public_path("/img_system/banner_principal.png"));
        $imagen_b64 = base64_encode($archivo);
        $logo_b64 = "data:image/png;base64,{$imagen_b64}";
        $fecha = date("d/M/Y");
        $hora = date("h:i a");
        $pdf = null;
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView($ruta,compact('mensaje','fecha','hora','logo_b64', 'headers', 'tipo'))->setPaper($papel, $orientacion);

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