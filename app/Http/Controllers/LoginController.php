<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'O usuário ou senha estão incorretos';
        }

        if($request->get('erro') == 2){
            $erro = 'A página requer autenticação do usuário';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
        $regras = [
            'login' => 'required|min:3|max:50',
            'senha' => 'required|min:8'
        ];

        $feedback = [
            'login.required' => 'O campo login (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório',
            'login.min' => 'O :attribute deve ter no mínimo 3 caracteres',
            'senha.min' => 'A :attribute deve ter no mínimo 8 caracteres',
            'max' => 'O :attribute deve ter no máximo 50 caracteres'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('login');
        $senha = $request->get('senha');

/*         echo "Usuário: $email | Senha: $senha";
        echo "<br>"; */

        $user = new User();

        $user = $user->where('email', $email)
                     ->where('password', $senha)
                     ->get()
                     ->first();

        if(isset($user->name)){
            session_start();

            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        };
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
