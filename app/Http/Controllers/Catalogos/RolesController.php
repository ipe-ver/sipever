<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Role;

class RolesController extends Controller
{
    public function index()
    {

        return view('catalogos.roles');
    } 

    public function get_roles()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = Role::orderby('id')->get();
       // dd($items);
        
              
        return response()->json($items);
    } 
}
