<?php

namespace App\Http\Controllers\Nosotros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformacionController extends Controller
{
    public function informacion()
    {
        return view('nosotros.informacion');
    }
}
