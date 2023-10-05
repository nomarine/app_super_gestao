<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function consultar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(10);

        return view('app.fornecedor.consultar', ['fornecedores'=>$fornecedores, 'request'=>$request]);
    }

    public function cadastrar(Request $request) {
        $msg = '';

        if($request->input('_token') != '' && $request->id == ''){
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
        } elseif($request->input('_token') != '' && $request->id != '') {
            $fornecedor = Fornecedor::find($request->id);
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Sucesso! Fornecedor atualizado.';
            } else {
                $msg = 'Falha ao tentar atualizar fornecedor.'; 
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'msg'=>$msg]);
        }

        return view('app.fornecedor.cadastrar', ['msg' => $msg]);
    }

    public function editar($id, $msg=''){
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.cadastrar', ['fornecedor'=>$fornecedor, 'msg'=>$msg]);
    }

    public function excluir($id){
        Fornecedor::find($id)->delete();
        
        return redirect()->route('app.fornecedor');
    }
}
