<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsavel;

class ResponsavelController extends Controller
{
    public function index()
    {
        $responsavel = Responsavel::all();

        return response()->json($responsavel);
    }
}
