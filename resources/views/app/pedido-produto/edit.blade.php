@extends('app.layouts.basico') 

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Cadastro de Pedidos</p>
        </div>

        @include('app.pedido.layouts._partials.menu')

        <div class="informacao-pagina">
            @component('app.pedido.layouts._components.form_create_edit', ['pedido'=>$pedido, 'clientes'=>$clientes])
            @endcomponent
        </div>

    </div>
    
@endsection