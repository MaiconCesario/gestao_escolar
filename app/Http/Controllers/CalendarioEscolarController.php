<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarioEscolar;

class CalendarioEscolarController extends Controller
{
    public function index()
    {
        $calendario = CalendarioEscolar::all();

        return response()->json($calendario) ?? 'None';
    }
}
