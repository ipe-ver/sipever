<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\Model\Rhumanos\Empleado;

class UsersController extends Controller
{
    
    public function index()
    {

        return view('catalogos.user');
    } 

    public function get_users()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = User::with('empleados')->get();
       // dd($items);
        
              
        return response()->json($items);
    } 

    

    
}
