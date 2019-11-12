<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;
use DB;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermisosController extends Controller
{
 
    public function index()
    {

        return view('catalogos.permisos');
    } 

    public function store(Request $request)
    {
        
        //INSTANCIAR EL OBJETO EQUIPO
        $permisos = new Permission;

        //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

        $permisos->name                              = $request->input('name');
        $permisos->guard_name                        = $request->input('guard_name');
        $permisos->save();

                          
        return response()->json([
            "estatus" => true,
            "tipo" => "success",
            "mensaje" => "La información se agregó correctamente."
        ]);
               
    }

    public function edit($id)
    {
         // instanciar objeto de equioi de acuerdo al id_equipo
     
         $permisos = Permission::find($id);
         $permisos = $permisos->name;

        // dd($permisos);

         return response()->json($permisos);
        
        /* return view('catalogos.permisos',
                     [
                         'permisos' => $permisos,
                        
                         
                     ]);*/
                   
    }

    public function update(Request $request, $id)
    {
       // $estatus = 1;
       // dd($request);
       $permisos = Permission::find($id);
        //dd($empleado);
        

        $permisos->name                             = $request->input('name');
        
        $permisos->save();

                          
        return response()->json([
            "estatus" => true,
            "tipo" => "success",
            "mensaje" => "La información se agregó correctamente."
        ]);

        
                        


    }

    public function get_permisos()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = DB::table('permissions')->get();
       
       // dd($items);
           
        return response()->json($items);
    } 

    
}
