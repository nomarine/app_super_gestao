<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "O IP $ip requisitou a rota $rota"]);
        
        $resposta = $next($request);

        $resposta->setStatusCode(201, "O código e mensagem foram alterados");

        return $resposta;
        //return Response('Passamos pelo middleware e finalizamos nele');
    }
}
