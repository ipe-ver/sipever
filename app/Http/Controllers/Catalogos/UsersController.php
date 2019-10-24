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
        
        return view('catalogos.create',
        [
            'catRoles' => $this->catRoles
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
