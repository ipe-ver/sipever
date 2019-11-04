<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    private $catPermisos; 

    public function __construct()
    {
       
        $this->catPermisos           = Permission::select('id as valor','name as descripcion')->orderBy('id')->get(); 
        //dd($this->catPermisos);    

    }

    public function index()
    {
        return view('catalogos.roles');
    } 

    //Muestra la vista del formulario para crear nuevo tarjetón
    public function create() 
    {        
        /*foreach ($this->catEmpleados as $empleado) {            
            $this->empleados[] = array('valor' => $empleado->id, 'descripcion' => $empleado->descripcionBusqueda );
        }*/

        /*foreach ($this->catEmpleados as $empleado) {            
            $this->empleados[] = array('valor' => $empleado->id, 'descripcion' => $empleado->nombrecompleto );
        }*/
        
        return view('catalogos.add_rol',
            [
                //'catEmpleados' => $this->empleados,
                'catPermisos' => $this->catPermisos,
                
            ]);     
    }



    public function store(Request $request)
    {
        
       // dd($request);
        $permiso = $request->input('id_permisos');
       //dd($permiso);

        //INSTANCIAR EL OBJETO EQUIPO
        $roles = new Role;


        //RECIBIR LOS INPUT DEL FORMULARIO E INSERTARLOS EN LA TABLA CAT_EQUIPOS

        $roles->name                              = $request->input('name');
        $roles->description                       = $request->input('description');
        $roles->guard_name                        = $request->input('guard_name');
        $roles->save();

       

        $roles = Role::find($roles->id);
        //dd($roles);
        $roles->permisions()->attach($permiso);

        

                          
        return response()->json([
            "estatus" => true,
            "tipo" => "success",
            "mensaje" => "La información se agregó correctamente."
        ]);
               
    }


    public function get_roles()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = Role::orderby('id')->get();
       // dd($items);
        
              
        return response()->json($items);
    } 

    public function get_permisos()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = DB::table('permissions')->get();
       
       // dd($items);
           
        return response()->json($items);
    } 
}
