<?php

namespace App\Http\Controllers\Almacen;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Pagination\LengthAwarePaginator;
use DB;
use Illuminate\Support\Facades\Input;

class PartidaController extends Controller
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

        return view('almacen.partidas',compact('partidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $input = Input::only('cta','scta','sscta', 'nombre', 'grupo','ctaarmo', 'nomarmo');
        $cta = $input['cta'];
        $scta = $input['scta'];
        $sscta = $input['sscta'];
        $nombre = $input['nombre'];
        $grupo=$input['grupo'];
        $ctaarmo = $input['ctaarmo'];
        $nomarmo = $input['nomarmo'];

        try {
            DB::select("call sp_almacenar_grupo(?,?,?,?,?,?,?,?)", array($cta, $scta, $sscta, $nombre, $ctaarmo, $nomarmo, $grupo, 1));
            return redirect()->route('almacen.partidas.index')
                        ->with('success','Partida guardada exitosamente');
        } catch (Exception $e) {
            return back()->withErrors(['msg','Error en alguna parte']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $input = Input::only('cta','scta','sscta', 'nombre', 'grupo','ctaarmo', 'nomarmo');
        $cta = $input['cta'];
        $scta = $input['scta'];
        $sscta = $input['sscta'];
        $nombre = $input['nombre'];
        $grupo=$input['grupo'];
        $ctaarmo = $input['ctaarmo'];
        $nomarmo = $input['nomarmo'];

        try {
            DB::select("call sp_actualizar_grupo(?,?,?,?,?,?,?,?,?)", array($id, $cta, $scta, $sscta, $nombre, $ctaarmo, $nomarmo, $grupo, 1));
            return redirect()->route('almacen.partidas.index')
                        ->with('success','Partida actualizada exitosamente');
        } catch (Exception $e) {
            return back()->withErrors(['msg','Error en alguna parte']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $input = Input::only('nombre');
         $nombre = trim($input['nombre']);
         if(empty($nombre)){
            return back()->with('warning','Porfavor seleccione una partida para reasignar los artículos');
         } else{
            try {
                DB::select("call sp_eliminar_grupo(?,?)", array($id,$nombre));
                return redirect()->route('almacen.partidas.index')
                            ->with('success','Partida eliminada exitosamente');
            } catch (Exception $e) {
                return back()->withErrors(['msg','Error en alguna parte']);
            }
         }
    }
}
