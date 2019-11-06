<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\PDOConnection;
use Exception;
use Auth;
use DB;

class ValeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->hasRole('almacen_admin') || Auth::user()->hasRole('almacen_capturista')){
            $cabeceras = DB::select('call sp_get_vales()');
        return view('almacen.vales', compact('cabeceras'));
        }else if(Auth::user()->hasRole('almacen_oficinista')){
            $partidas = DB::select("call sp_get_grupos");
            return view('almacen.vales', compact('partidas'));
        }else{
            return view('almacen.index');
        }  
    }

    public function getArticulos(Request $request){
        $nombrePartida = $request->input('partida');
        $articulos = DB::select("call sp_obtener_articulos_grupo(?)", array($nombrePartida));
        return json_encode($articulos);
    }
    
    public function getDetalles(Request $request){
        $fecha = $request->fecha;
        $folio = $request->folio;
        $detalles = DB::select('call sp_get_articulos_vale(?,?)',array($folio,$fecha));
        return json_encode($detalles);
        
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

    public function validarOrden(Request $request){
        $db = DB::connection()->getPdo();
        //Establecemos la conexión
        $db->setAttribute(PDOConnection::ATTR_ERRMODE, PDOConnection::ERRMODE_EXCEPTION);
        $db->setAttribute(PDOConnection::ATTR_EMULATE_PREPARES, true);

        $claves = $request->input('0');
        $descripciones = $request->input('1');
        $cantidades = $request->input('3');
        $precios = $request->input('4');
        $encabezado = $request->encabezado;
        $folio = $encabezado[0];
        $tipo = $encabezado[1];
        if($tipo == "Consumo"){
            for ($i=0; $i < sizeof($claves); $i++) { 
                $cantidad_articulo = DB::select('SELECT existencias FROM cat_articulos WHERE clave = ?', array($claves[$i]));
                if(intval($cantidades[$i]) > intval($cantidad_articulo[0]->existencias)){
                    return redirect()->back()->with('warning', 'No hay suficientes existencias de uno o mas artículo para satisfacer la solicitud');
                }
            }
        }
        
        $id_vale = DB::select('SELECT id_pedido_consumo FROM c_pedido_consumo WHERE folio = ?', array($folio))[0]->id_pedido_consumo;

        //Preparamos la llamada al procedimiento remoto
        $query = $db->prepare('CALL sp_consumo(?,@clave)');

        $query->bindParam(1,$id_vale);
        try{
            $query->execute();
            $query->closeCursor();
            //accedemos al valor de retorno para regresar la vista correspondiente.
            $results = $db->query('SELECT @clave AS result')->fetch(PDOConnection::FETCH_ASSOC);
            if ($results) {
                // Obtenemos la clave generada
                $clave_generada = $results['result'];

                // Se manda a llamar al procedimiento almacenado para registrar los detalles de la factura
                // Se llama al procedimiento una vez por cada artículo que corresponda a la factura
                for ($i=0; $i < sizeof($claves) ; $i++) {
                    $query = $db->prepare('CALL sp_detalles_consumo(?,?,?)');
                    $query->bindParam(1,$clave_generada);
                    $query->bindParam(2,$claves[$i]);
                    $query->bindParam(3,$cantidades[$i]);

                    $query->execute();
                    $query->closeCursor();
                }
                return redirect()->route('almacen.vales.index')->with('success','Orden procesada correctamente');
            }elseif (empty($result)) {
                // Si el resultado viene vacío se regresa una advertencia
                return back()->with('warning', "Error al registrar datos de factura, intente de nuevo mas tarde \nSi el problema persiste contacte al departamento de tecnologías de la información");
            }else{
                return back()->withErrors(['msg', "Error de base de datos \n Contacte al departamento de tecnologías de la información"]);
            }
        }catch (Exception $e) {
            $mensaje = "{$e->getMessage()} \n Contacte al departamento de tecnologías de la información";
            return back()->withErrors([$mensaje]);
        }

        return redirect()->route('almacen.index');
    }
}
