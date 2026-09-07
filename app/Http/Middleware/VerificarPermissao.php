<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarPermissao
{
    public function handle(Request $request, Closure $next): Response
    {
        return response()->view('acesso', [
            'mensagem' => 'Você não tem permissão para acessar este site.',
            'contato' => 'Favor entrar em contato com o administrador.'
        ]);
    }
}