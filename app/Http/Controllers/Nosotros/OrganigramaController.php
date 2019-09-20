<?php

namespace App\Http\Controllers\Nosotros;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrganigramaController extends Controller
{
    public function organigrama()
    {
        return view('nosotros.organigrama');
    }
}
