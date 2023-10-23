<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::paginate(5);
        return view('app.cliente.index', ['request'=>$request, 'clientes'=>$clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.cliente.create');
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
            'nome' => 'required|min:2|max:40'
        ];

        $feedback = [
            'required'=>'Obrigatório informar :attribute.',
            'min'=>':attribute deve ter no mínimo :min caracteres.',
            'max'=>':attribute deve ter no máximo :max caracteres.',
        ];

        $request->validate($regras, $feedback);

        $cliente = new Cliente();
        $cliente->nome = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        return view('app.cliente.show', ['cliente'=>$cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('app.cliente.edit', ['cliente'=>$cliente]);
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
        $regras = [
            'nome' => 'required|min:2|max:40'
        ];

        $feedback = [
            'required'=>'Obrigatório informar :attribute.',
            'min'=>':attribute deve ter no mínimo :min caracteres.',
            'max'=>':attribute deve ter no máximo :max caracteres.',
        ];

        $request->validate($regras, $feedback);

        $cliente = Cliente::find($id);
        $cliente->nome = $request->get('nome');
        $cliente->save();

        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.index');
    }
}
