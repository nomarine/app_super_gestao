<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => ['nome' => 'EDP', 'status' => 'A'],
            1 => ['nome' => 'Sabesp', 'status' => 'A'],
            2 => ['nome' => 'Tanby', 'status' => 'I'],
            3 => ['nome' => 'Peloggia', 'status' => 'I', 'cnpj' => '50.127.889.01-0001/78'],
            4 => ['nome' => 'Ranne Informática', 'status' => 'A', 'cnpj' => '']
        ];

        $fornecedor_status = $fornecedores[4]['status'] == 'I' ? 'Fornecedor inativo' : 'ATIVO';
        echo $fornecedor_status;

        return view('app.fornecedores', compact('fornecedores'));
    }
}
