<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $app = app();
        $cabecera1 = $app->make('stdClass');
        $cabecera1->folio = 'CONS201910081545';
        $cabecera1->tipo = 1;
        $cabecera1->fecha_recepcion = '08/10/2019';
        $cabecera1->departamento = 'DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN';

        $cabecera2 = $app->make('stdClass');
        $cabecera2->folio = 'COMP201910081550';
        $cabecera2->tipo = 3;
        $cabecera2->fecha_recepcion = '08/10/2019';
        $cabecera2->departamento = 'DEPARTAMENTO DE TECNOLOGÍAS DE LA INFORMACIÓN';

        $cabeceras = array($cabecera1, $cabecera2);
        return view('almacen.vales', compact('cabeceras'));
    }

    public function getDetalles(Request $request){
        $tipo = $request->tipo;
        $folio = $request->folio;
        $app = app();
        $respuesta = $app->make('stdClass');
        if($tipo == 1){
            $articulo1 = ['1303','PINTURA ACRÍLICA',12,12.45];
            $articulo2 = ['1304','PINTURA ACRÍLICA ROJA',10,11.45];
            $respuesta->articulos[0] = $articulo1;
            $respuesta->articulos[1] = $articulo2;
            return json_encode($respuesta);
        }else{
            $articulo1 = ['N/A','Calculadora cuántica',1,'N/A'];
            $respuesta->articulos[0] = $articulo1;
            return json_encode($respuesta);
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

    public function validarOrden(Request $request){
        $claves = $request->input('0');
        $descripciones = $request->input('1');
        $cantidades = $request->input('2');
        $precios = $request->input('3');
        $encabezado = $request->encabezado;
        return redirect()->route('almacen.index');
    }
}
