<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\User;
use App\Role;
use App\Model\Rhumanos\Empleado;

class UsersController extends Controller
{
    /*****************************************************************************************
				DECLARAR VARIABLES
	*****************************************************************************************/
    private $catRoles; 
    private $catEmpleados; 

    /*****************************************************************************************
				VISTA DE CATALOGO DE USUARIOS
	*****************************************************************************************/  
    public function index()
    {       
       
        return view('catalogos.user');
       
    } 

    /*****************************************************************************************
				VISTA DE AGREGAR USUARIO AL CATALOGO DE USUARIOS
	*****************************************************************************************/  
    public function create() 
    {             
        $this->catRoles           = \App\Role::select('id as valor','name as descripcion')->orderBy('id')->get(); 
        
        $this->catEmpleados       = \App\Model\Rhumanos\Empleado::where('estatus','1')->get()->sortBy('nombrecompleto');
        //dd($this->catEmpleados);
        
        foreach ($this->catEmpleados as $empleado) {            
            $this->empleados[] = array('valor' => $empleado->id, 'descripcion' => $empleado->nombrecompleto );
        } 

        //dd($this->empleados);

        return view('catalogos.create',
        [
            'catRoles' => $this->catRoles,
            'catEmpleados' => $this->empleados, 
        ]); 
    }

    
    public function edit($id)
    {
        $this->catRoles           = \App\Role::select('id as valor','name as descripcion')->orderBy('id')->get(); 

        $this->catEmpleados       = \App\Model\Rhumanos\Empleado::where('estatus','1')->get()->sortBy('nombrecompleto');

        foreach ($this->catEmpleados as $empleado) {            
            $this->empleados[] = array('valor' => $empleado->id, 'descripcion' => $empleado->nombrecompleto );
        } 

         // instanciar objeto de equioi de acuerdo al id_equipo
     
         $usuario = User::find($id);
         //dd($usuario);
        
         return view('catalogos.create',
                     [
                        'usuario' => $usuario,
                        'catEmpleados' => $this->empleados, 
                        'catRoles' => $this->catRoles,
                         
                     ]);
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        //$permiso = $request->input('id_permisos');
        

        //INSTANCIAR EL OBJETO EQUIPO
        $usuario = User::find($id);
      
       // dd($usuario);

        //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

        $usuario->username                        = $request->input('username');
        $usuario->email                           = $request->input('email');
        $usuario->name                            = $request->input('username');
        //$usuario->password                        = bcrypt($request->input('password'));
        $usuario->id_empleado                     = $request->input('id_empleado');

        $usuario->roles()->sync($request->input('id_role'));
        $usuario->save();
        
                            
        return response()->json([
            "estatus" => true,
            "tipo" => "success",
            "mensaje" => "La información se agregó correctamente."
        ]);

    }

    




    /*****************************************************************************************
	            LISTADO DE USUARIOS
	*****************************************************************************************/          
    public function get_users()
    {
        $items = User::with('empleados')->get();
           
        return response()->json($items);
    } 

   


    

    
}
