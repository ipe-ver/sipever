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
    
    private $catRoles;

    public function __construct()
    {
       
        

    }

    public function index()
    {       
       // $role = new Role();
        //dd($role);
        return view('catalogos.user');
       
    } 

    public function create() //Muestra la vista del formulario para crear nuevo tarjetón
    {             
       
        $catRoles = \App\Role::orderBy('id')->get();
       // dd($catRoles);

        return view('catalogos.create', compact('catRoles'));   
            
           
    }


    public function get_users()
    {

        $items = User::with('empleados')->get();
           
        return response()->json($items);
    } 



    

    
}
