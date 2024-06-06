<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MeuMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Adicione sua lógica personalizada aqui
        if ($request->someCondition) {
            // Faça algo ou modifique a resposta
        }

        return $next($request);
    }
}
