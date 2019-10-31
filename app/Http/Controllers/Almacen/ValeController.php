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
        $respuesta = $app->make('stdClass');
        if($tipo == 1){
            $respuesta->clave = "1303";
            $respuesta->descripcion="PINTURA ACRÍLICA";
            $respuesta->cantidad = 12;
            $respuesta->precio=12.45;
            return json_encode($respuesta);
        }else{
            $respuesta->clave = "N/a";
            $respuesta->descripcion="Calculadora cuántica";
            $respuesta->cantidad = 1;
            $respuesta->precio=15000;
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
}
