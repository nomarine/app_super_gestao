<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\ProdutoDetalhe;
use App\Unidade;
use App\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(5);

        return view('app.produto.index', ['produtos'=>$produtos, 'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades'=>$unidades, 'fornecedores'=>$fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome'=>'required|min:2|max:40',
            'descricao'=>'required|min:2|max:300',
            'peso'=>'required|integer',
            'unidade_id'=>'required|exists:unidades,id',
            'fornecedor_id'=>'required|exists:fornecedores,id'
        ];

        $feeback = [
            'required'=>'O campo :attribute é obrigatório.',
            'unidade_id.required'=>'A unidade deve ser selecionada.',
            'min'=>'O campo :attribute deve ter no mínimo :min caracteres.',
            'max'=>'O campo :attribute deve ter no máximo :max caracteres.',
            'integer'=>'Informe apenas valores numéricos inteiros.',
            'exists'=>':attribute inexistente.'
        ];

        $request->validate($regras, $feeback);

        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto'=>$produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto'=>$produto, 'unidades'=>$unidades, 'fornecedores'=>$fornecedores,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome'=>'required|min:2|max:40',
            'descricao'=>'required|min:2|max:300',
            'peso'=>'required|integer',
            'unidade_id'=>'required|exists:unidades,id',
            'fornecedor_id'=>'required|exists:fornecedores,id'
        ];

        $feeback = [
            'required'=>'O campo :attribute é obrigatório.',
            'unidade_id.required'=>'A unidade deve ser selecionada.',
            'min'=>'O campo :attribute deve ter no mínimo :min caracteres.',
            'max'=>'O campo :attribute deve ter no máximo :max caracteres.',
            'integer'=>'Informe apenas valores numéricos inteiros.',
            'exists'=>':attribute inexistente.'
        ];

        $request->validate($regras, $feeback);

        $produto->update($request->all());
        
        return redirect()->route('produto.show', ['produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index');
    }
}
