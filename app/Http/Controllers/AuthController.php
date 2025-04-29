<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (!$token = auth()->attempt($credenciais)) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user(),
        ]);
    }

    public function me()
    {
        $user = auth()->user();
        $user->load($user->tipo);
        return response()->json($user);
    }

    public function logout()
    {
        auth()->logout();
        return response()->json(['message' => 'Deslogado com sucesso']);
    }
}
