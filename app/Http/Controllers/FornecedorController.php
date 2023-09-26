<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function consultar() {
        return view('app.fornecedor.consultar');
    }

    public function cadastrar(Request $request) {
        $msg = '';

        if($request->input('_token') != ''){
            $regras = [
                'nome' => 'required|min:2|max:40', 
                'site' => 'required', 
                'uf' => 'required|min:2|max:2', 
                'email' => 'required|email'
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório.', 
                'min' => 'O campo deve ter no mínimo :min caracteres.', 
                'max' => 'O campo deve ter no máximo :max caracteres.',
                'email' => 'E-mail inválido.'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Sucesso! Fornecedor cadastrado.';
        }

        return view('app.fornecedor.cadastrar', ['msg'=>$msg]);
    }
}
