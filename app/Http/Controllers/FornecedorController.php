<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        $fornecedores = [
            0 => [
                'nome' => 'EDP', 
                'status' => 'A',
                'ddd' => '12',
                'telefone' => '982038812'
            ],
            1 => [
                'nome' => 'Sabesp', 
                'status' => 'A'
            ],
            2 => [
                'nome' => 'Tanby', 
                'status' => 'I',
                'ddd' => '21',
                'telefone' => '3527236'
            ],
            3 => [
                'nome' => 'Peloggia', 
                'status' => 'I', 
                'cnpj' => '50.127.889.01-0001/78'
            ],
            4 => [
                'nome' => 'Ranne Informática', 
                'status' => 'A', 
                'cnpj' => null,
                'ddd' => '718',
                'telefone' => '59871920'
                ]
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
