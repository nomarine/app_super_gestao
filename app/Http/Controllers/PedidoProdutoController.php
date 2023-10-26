<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PedidoProduto;
use App\Pedido;
use App\Produto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        
        return view('app.pedido-produto.create', ['pedido'=>$pedido, 'produtos'=>$produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id'=>'exists:produtos,id',
            'quantidade'=>'required'
        ];

        $feedback = [
            'exists'=>':attribute inexistente.',
            'required'=>'O campo :attribute é obrigatório.'
        ];

        $request->validate($regras,$feedback);

        $pedido->produtos()->attach($request->get('produto_id'), [
            'quantidade'=>$request->get('quantidade')
        ]);

/* 
        Attach para multi registros
        $pedido->produtos()->attach([
            $request->get('produto_id')=>[
                'quantidade'=>$request->get('quantidade')
            ]
        ]);
 */
        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoProduto $pedidoProduto)
    {
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedidoProduto->pedido_id]);
    }
}
