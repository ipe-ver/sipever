<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PermisosController extends Controller
{
    public function index()
    {

        return view('catalogos.permisos');
    } 

    public function get_permisos()
    {

        //$items = User::with('rch_empleados')->orderby('id')->get();
        $items = DB::table('permissions')->get();
       
       // dd($items);
        
              
        return response()->json($items);
    } 
}
