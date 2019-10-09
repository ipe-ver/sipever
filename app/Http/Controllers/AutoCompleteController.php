<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class AutoCompleteController extends Controller
{
    private $result;  

    public function index()
    {
        //return view('search');
        return view('adminlte::layouts.landing');
    }
 
    public function search(Request $request)
    {
        $search = $request->get('term');
             
        $result          = \App\Model\Directorio\Extension::select ('extension', 'descripcion')
                            ->where('descripcion', 'LIKE', '%'. $search. '%')
                            ->get();
           
        //dd($result);
        return response()->json($result);

            
    } 
}
