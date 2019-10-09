<?php

namespace App\Http\Controllers\Extension;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Directorio\Extension;

class ExtensionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('search');
        return view('adminlte::layouts.landing');
    }

   
    public function autocomplete(Request $request)
    {
        $data = Extension::select("descripcion")
        ->where("descripcion","LIKE","%{$request->input('query')}%")
        ->get();

        return response()->json($data);
            
    } 
}


