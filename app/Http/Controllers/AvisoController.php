<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aviso;

class AvisoController extends Controller
{
    public function index()
    {
        $aviso = Aviso::all();

        return response()->json($aviso) ?? 'None';
    }
}
