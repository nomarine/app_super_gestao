<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index() {
        $fornecedores = [
            'EDP',
            'Sabesp',
            'Tanby',
            'Peloggia'
        ];
        return view('app.fornecedores', compact('fornecedores'));
    }
}
