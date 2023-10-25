@extends('app.layouts.basico') 

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Informações do Pedido</p>
        </div>

        @include('app.pedido.layouts._partials.menu')

        <div class="informacao-pagina">
            <table class="tabela">
                <tr>
                    <td>ID do Pedido</td>
                    <td>{{$pedido->id}}</td>
                </tr>
                <tr>
                    <td>ID do Cliente</td>
                    <td>{{$pedido->cliente_id}}</td>
                </tr>
            </table>  
        </div>

    </div>
    
@endsection