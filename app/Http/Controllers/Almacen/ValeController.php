<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        /*$app = app();
        $cabecera1 = $app->make('stdClass');
        $cabecera1->folio = 'CONS201910081545';
        $cabecera1->tipo = 1;
        $cabecera1->fecha = '08/10/2019';
        $cabecera1->oficina = 'DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN';

        $cabecera2 = $app->make('stdClass');
        $cabecera2->folio = 'COMP201910081550';
        $cabecera2->tipo = 3;
        $cabecera2->fecha = '08/10/2019';
        $cabecera2->oficina = 'DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN';

        $cabeceras = array($cabecera1, $cabecera2);*/

        $cabeceras = DB::select('call sp_get_vales()');

        return view('almacen.vales', compact('cabeceras'));
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
        $claves = $request->input('0');
        $descripciones = $request->input('1');
        $cantidades = $request->input('3');
        $precios = $request->input('4');
        $encabezado = $request->encabezado;
        $folio = $encabezado[0];
        dd($folio, $claves, $descripciones, $cantidades, $precios);
        return redirect()->route('almacen.index');
    }
}
