<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TipoResponsavel
{
    public function handle(Request $request, Closure $next)
    {
        // Pega o usuário logado
        $user = auth()->user();

        // Verifica se o tipo do usuário é 'responsavel'
        if ($user && $user->tipo !== 'responsavel') {
            // Retorna erro 403 (Acesso não autorizado) se não for 'responsavel'
            return response()->json(['error' => 'Acesso não autorizado'], 403);
        }

        // Se for 'responsavel', permite o acesso à rota
        return $next($request);
    }
}
