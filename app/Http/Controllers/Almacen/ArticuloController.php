<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Pagination\LengthAwarePaginator;
use DB;

class ArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidas = DB::select("call sp_get_grupos");
        $unidades = DB::select("call sp_get_unidades");

        $page = request('page',1);
        $pageSize = 10;
        $articulos = DB::select("call sp_get_articulos");
        $offset = ($page * $pageSize) - $pageSize;
        $data = array_slice($articulos, $offset, $pageSize, true);
        $paginator = new LengthAwarePaginator($data, count($data), $pageSize, $page);


        return view('almacen.articulos',['grupos'=>$partidas, 'unidades'=>$unidades,'articulos'=>$paginator]);
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
