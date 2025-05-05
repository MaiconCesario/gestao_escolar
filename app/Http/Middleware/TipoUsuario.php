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

    /*public function handle(Request $request, Closure $next, ...$tipos)
    {
        $user = auth()->user();

        \Log::debug('Tipo do usuário autenticado', [
            'user_id' => $user?->id,
            'tipo' => $user?->tipo,
            'tipos_aceitos' => $tipos,
        ]);

        if (!in_array($user->tipo, $tipos)) {
            return response()->json([
                'error' => 'Acesso não autorizado',
                'tipo_usuario_autenticado' => $user->tipo,
                'tipos_esperados' => $tipos,
            ], 403);
        }

        return $next($request);
    }*/

}
