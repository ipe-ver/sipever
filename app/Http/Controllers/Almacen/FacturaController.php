<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Doctrine\DBAL\Driver\PDOConnection;
use DB;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidas = DB::select("call sp_get_grupos");
        $proveedores = DB::select("call sp_get_proveedores");
        return view('almacen.facturas.facturas', compact('partidas','proveedores'));
    }

    public function getArticulos(Request $request){
        $nombrePartida = $request->input('partida');
        $articulos = DB::select("call sp_obtener_articulos_grupo(?)", array($nombrePartida));
        return json_encode($articulos);
    }

    public function registrarFactura(Request $request){
        $articulos = $request->claveArticulo;
        if(empty($articulos)){
            return back()->with('warning','Porfavor ingrese al menos un articulo');
        }else{
            $nombreProveedor = $request->proveedor;
            $fecha_movimiento = $request->fecha_ingreso;
            $no_factura = $request->noFactura;
            $fecha_facturacion = $request->fecha_facturacion;
            $iva=$request->iva;
            $subtotal = $request->subtotal;
            $no_mes=10;
            $anio=2019;
            //Obtenemos los datos de la conexión con la base de datos
            $db = DB::connection()->getPdo();
            //Establecemos la conexión
            $db->setAttribute(PDOConnection::ATTR_ERRMODE, PDOConnection::ERRMODE_EXCEPTION);
            $db->setAttribute(PDOConnection::ATTR_EMULATE_PREPARES, true);

            //Preparamos la llamada al procedimiento remoto
            $query = $db->prepare('CALL sp_compra_almacen(?,?,?,?,?,?,?,?,@clave)');
            //Hacemos un binding de los parámetros, así protegemos nuestra 
            //llamada de una posible inyección sql
            $query->bindParam(1,$no_mes);
            $query->bindParam(2,$anio);
            $query->bindParam(3,$nombreProveedor);
            $query->bindParam(4,$fecha_movimiento);
            $query->bindParam(5,$no_factura);
            $query->bindParam(6,$fecha_facturacion);
            $query->bindParam(7,$iva);
            $query->bindParam(8,$subtotal);
            try {
                //Ejecutamos el procedimiento
                $query->execute();
                $query->closeCursor();
                //accedemos al valor de retorno para regresar la vista correspondiente.
                $results = $db->query('SELECT @clave AS result')->fetch(PDOConnection::FETCH_ASSOC);

                if ($results) {
                    $resultado = $results['result'];
                    return back()->with('success', $resultado);
                }elseif ($result ==0) {
                    return back()->with('warning', "Error al generar nuevo mes, intente de nuevo mas tarde \nSi el problema persiste contacte al departamento de tegnologías de la información");
                }else{
                    return back()->withErrors(['msg', "Error de base de datos \n Contacte al departamento de tecnologías de la información"]);
                }
            } catch (Exception $e) {
                return back()->withErrors(['msg',$e->getMessage()+"\n Contacte al departamento de tecnologías de la información"]);
            }
        }
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
}
