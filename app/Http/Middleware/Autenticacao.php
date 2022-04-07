<?php

namespace App\Http\Middleware;

use Closure;

class Autenticacao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $metodo_autenticacao, $perfil)
    {
        /* if($metodo_autenticacao == 'padrao'){
            echo "Validar credenciais no banco de dados";
        } else if($metodo_autenticacao == 'ldap'){
            echo "Validar credenciais no Active Directory";
        }
        echo "<br>";
        if($perfil == 'visitante'){
            echo "Exibir recursos limitados";
        } else {
            echo "Exibir recursos do perfil";
        }

        echo "<br>";

        if(false){
            return $next($request);    
        } else {
            return Response('Acesso negado. Sem permissão de acesso.');
        } */

        session_start();

        if(isset($_SESSION['email']) && $_SESSION['email'] != '') {
            return $next($request);
        } else {
            return redirect()->route('site.login', ['erro' => 2]);
        }
    }
}
