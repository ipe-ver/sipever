<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Driver\PDOConnection;
use App\Http\Controllers\Controller;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('almacen.cierre_mes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

    /**
     * Cierra el mes ingresado y crea uno nuevo.
     * @param int $no_mes
     * @param string $anio
     * @return \Illuminate\Http\Response
     */
    public function cerrar_mes(Request $request){
        $no_mes = $request->input('numMes');
        $anio = $request->input('year');
        
        $mensaje="";
        if($no_mes < 10){
            $mensaje = "0{$no_mes} - {$anio}";
        }else{
            $mensaje = "{$no_mes} - {$anio}";
        }

        return back()->with('success', $mensaje);
        /*
        //Obtenemos los datos de la conexión con la base de datos
        $db = DB::connection()->getPdo();
        //Establecemos la conexión
        $db->setAttribute(PDOConnection::ATTR_ERRMODE, PDOConnection::ERRMODE_EXCEPTION);
        $db->setAttribute(PDOConnection::ATTR_EMULATE_PREPARES, true);

        //Preparamos la llamada al procedimiento remoto
        $query = $db->prepare('CALL sp_cerrar_periodo(?,?,@result)');
        //Hacemos un binding de los parámetros, así protegemos nuestra 
        //llamada de una posible inyección sql
        $query->bindParam(1,$no_mes);
        $query->bindParam(2,$anio);

        try {
            //Ejecutamos el procedimiento
            $query->execute();
            $query->closeCursor();
            //accedemos al valor de retorno para regresar la vista correspondiente.
            $result = $db->query('SELECT @result AS result')->fetch(PDOConnection::FETCH_ASSOC);

            if ($result==1) {
                return redirect('almacen.cerrar_mes')->with('success', 'Mes cerrado exitosamente');
            }elseif ($result ==0) {
                return redirect('almacen.cerrar_mes')->with('warning', "Error al generar nuevo mes, intente de nuevo mas tarde \nSi el problema persiste contacte al departamento de tegnologías de la información");
            }else{
                return redirect('almacen.cerrar_mes')->withErrors(['msg', "Error de base de datos \n Contacte al departamento de tecnologías de la información"]);
            }
        } catch (Exception $e) {
            return redirect('almacen.cerrar_mes')->withErrors(['msg',$e->getMessage()+"\n Contacte al departamento de tecnologías de la información"]);
        }*/
    }

}
