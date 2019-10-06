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


        return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index]);
    }

    public function page($no_index){
        $partidas = DB::select("call sp_get_grupos");
        $unidades = DB::select("call sp_get_unidades");
        $articulos = DB::select("call sp_get_articulos(?)", array($no_index*10));

        if($no_index == 0){
            return redirect()->route('almacen.articulos.index');
        }else{
            return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index]);
        }
    }

    public function buscarPorPartida($nombrePartida){
        $partidas = DB::select("call sp_get_grupos");
        $unidades = DB::select("call sp_get_unidades");
        $articulos = DB::select("call sp_obtener_articulos_grupo(?)", array($nombrePartida));


        return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index]);
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
    public function update()
    {
        $input = Input::only('clave','descripcion','existencias', 'unidad', 'stock_minimo','precio_unitario', 'partida');
        $clave = $input['clave'];
        $descripcion = $input['descripcion'];
        $existencias = $input['existencias'];
        $unidad = $input['unidad'];
        $precio_unitario=$input['precio_unitario'];
        $stock_minimo = $input['stock_minimo'];
        $partida = $input['partida'];

        try {
            DB::select("call sp_actualizar_articulo(?,?,?,?,?,?,?,?)", array($clave, $descripcion, 1, $existencias,$precio_unitario, $partida, $stock_minimo, $unidad));
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
    public function destroy()
    {
        //
    }
}
