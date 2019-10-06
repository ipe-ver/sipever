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
            return $this->index();
        }else{
            return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,
            'articulos'=>$articulos, 'index' => $no_index]);
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
    public function update()
    {
        $input = Input::only('clave','descripcion','existencias');
        $clave = $input['clave'];
        return redirect()->route('almacen.articulos.index')
                        ->with('success',$clave);
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
