<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function consultar() {
        return view('app.fornecedor.consultar');
    }

    public function cadastrar() {
        return view('app.fornecedor.cadastrar');
    }
}
