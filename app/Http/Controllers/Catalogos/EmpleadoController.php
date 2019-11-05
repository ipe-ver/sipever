<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Rhumanos\Empleado;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('catalogos.empleado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catalogos.add_empleado');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $estatus = 1;
        //INSTANCIAR EL OBJETO EQUIPO
        $empleado = new Empleado;


        //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

        $empleado->no_personal                             = $request->input('no_personal');
        $empleado->fecha_ingreso                           = $request->input('fecha_ingreso');
        $empleado->apellido_paterno                        = $request->input('apellido_paterno');
        $empleado->apellido_materno                        = $request->input('apellido_materno');
        $empleado->nombre                                  = $request->input('nombre');
        $empleado->estatus                                 = $estatus;
        $empleado->save();

                          
        return response()->json([
            "estatus" => true,
            "tipo" => "success",
            "mensaje" => "La información se agregó correctamente."
        ]);
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

    public function get_empleados()
    {
        $items = Empleado::orderby('id')->get();
       // dd($items);
        
              
        return response()->json($items);
    } 
}
