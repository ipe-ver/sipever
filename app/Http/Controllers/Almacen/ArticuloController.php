<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Pagination\LengthAwarePaginator;
use DB;
use Illuminate\Support\Facades\Input;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no_index = 0;
        $partidas = DB::select("call sp_get_grupos");
        $unidades = DB::select("call sp_get_unidades");
        $articulos = DB::select("call sp_get_articulos(?)", array($no_index));
        $no_partida = 0;

        return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index, 'no_partida' => $no_partida]);
    }

    /**
     * Método para paginar los resultados que arroje la búsqueda de artículo
     * @param int $no_index
     * @return \Illuminate\Http\Response
    */

    public function page($no_index){
        $partidas = DB::select("call sp_get_grupos");
        $unidades = DB::select("call sp_get_unidades");
        $articulos = DB::select("call sp_get_articulos(?)", array($no_index*10));
        $no_partida = 0;
        if($no_index == 0){
            return redirect()->route('almacen.articulos.index');
        }else{
            return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index, 'no_partida' => $no_partida]);
        }
    }

    /**
     * Método para buscar artículos por partida.
     *
     * @param Request $request 
     * @return \Illuminate\Http\Response
    */

    public function buscarPorPartida(Request $request){
        $nombrePartida = trim($request->selectLista);
        $no_index = 0;
        $no_partida = 1;
        if(empty($nombrePartida)){
            return back()->with('warning','Porfavor seleccione una partida');
        }elseif($nombrePartida != "Todos"){
            $partidas = DB::select("call sp_get_grupos");
            $unidades = DB::select("call sp_get_unidades");
            $articulos = DB::select("call sp_obtener_articulos_grupo(?)", array($nombrePartida));


            return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
                'articulos'=>$articulos, 'index' => $no_index,'no_partida' => $no_partida ]);
        }else{
            return redirect()->route('almacen.articulos.index');
        }
    }

    public function buscarPorNombre(Request $request){
        $nombreArticulo = trim($request->input('nombreArticulo'));
        $no_index = 0;
        $no_partida = 1;
        if(empty($nombreArticulo)){
            return redirect()->route('almacen.articulos.index')->with('warning',
                'Porfavor ingrese el nombre de un articulo');
        }else{
            $partidas = DB::select("call sp_get_grupos");
            $unidades = DB::select("call sp_get_unidades");
            $articulos = DB::select("call sp_buscar_articulo_parametro(?)", array(strtoupper($nombreArticulo)));

            return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
                'articulos'=>$articulos, 'index' => $no_index,'no_partida' => $no_partida ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $clave = $request->clave;
        $descripcion = $request->descripcion;
        $existencias = $request->existencias;
        $unidad = $request->unidad;
        $precio_unitario=$request->precio_unitario;
        $stock_minimo =$request->stock_minimo;
        $stock_maximo = $request->stock_maximo;
        $partida = $request->partida;

        try {
            DB::select("call sp_almacenar_articulo(?,?,?,?,?,?,?,?,?)", array($clave, $descripcion, 1,
                $stock_minimo, $stock_maximo,$existencias, $precio_unitario, $partida, $unidad));
            return redirect()->route('almacen.articulos.index')
                        ->with('success','Articulo almacenado exitosamente');
        } catch (Exception $e) {
            return redirect()->route('almacen.articulos.index')
                        ->withErrors(['Error de conexión con la base de datos, intente mas tarde, si el problema persiste contacte al departamento de tecnologías de la información.']);
        }


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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   
        $clave = $request->clave;
        $descripcion = $request->descripcion;
        $existencias = $request->existencias;
        $unidad = $request->unidad;
        $precio_unitario=$request->precio_unitario;
        $stock_minimo = $request->stock_minimo;
        $partida = $request->partida;

        try {
            DB::select("call sp_actualizar_articulo(?,?,?,?,?,?,?,?)", array($clave, $descripcion, 1,
                $existencias,$precio_unitario, $partida, $stock_minimo, $unidad));
            return redirect()->route('almacen.articulos.index')
                        ->with('success','Articulo actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->route('almacen.articulos.index')
                        ->withErrors(['msg','Error en alguna parte']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($clave)
    {
        try {
            DB::select("call sp_baja_articulo(?)", array($clave));
            return redirect()->route('almacen.articulos.index')
                        ->with('success','Articulo dado de baja exitosamente');
        } catch (Exception $e) {
            return redirect()->route('almacen.articulos.index')
                        ->withErrors(['msg','Error en alguna parte']);
        }
    }

    public function actualizar(Request $request){
        $clave = $request->clave;
        $descripcion = $request->decripcion;
        $existencias = $request->existencias;
        $unidad = $request->unidad;
        $precio_unitario=$request->precio_unitario;
        $stock_minimo = $request->stock_minimo;
        $partida = $request->partida;

        try {
            DB::select("call sp_actualizar_articulo(?,?,?,?,?,?,?,?)", array($clave, $descripcion, 1,
                $existencias,$precio_unitario, $partida, $stock_minimo, $unidad));
            return redirect()->route('almacen.articulos.index')
                        ->with('success','Articulo actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->route('almacen.articulos.index')
                        ->withErrors(['msg','Error en alguna parte']);
        }
    }
}
