<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TipoUsuario
{
    public function handle(Request $request, Closure $next, ...$tipos)
    {
        $user = auth()->user();

        if (!in_array($user->tipo, $tipos)) {
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }

        return $next($request);
    }
}
