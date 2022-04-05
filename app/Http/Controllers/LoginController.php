<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request){
        $regras = [
            'login' => 'required|min:3|max:50',
            'senha' => 'required|min:8'
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'min' => 'O :attribute deve ter no mínimo 3 caracteres',
            'max' => 'O :attribute deve ter no máximo 50 caracteres'
        ];

        $request->validate($regras, $feedback);

        return "Chegamos aqui";
    }
}
