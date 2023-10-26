@extends('app.layouts.basico') 

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Pedidos</p>
        </div>

        @include('app.pedido.layouts._partials.menu')
        <div class="informacao-pagina">
            <div class="tabela">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <th>ID do Pedido</th>
                            <th>ID do Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr>
                            <td>{{$pedido->id}}</td>
                            <td>{{$pedido->cliente_id}}</td>
                            <td><a href='{{route('pedido-produto.create', ['pedido'=>$pedido->id])}}'>Adicionar produtos</a></td>
                            <td><a href='{{route('pedido.show', ['pedido'=>$pedido->id])}}'>Ver</a></td>
                            <td><a href='{{route('pedido.edit', ['pedido'=>$pedido->id])}}'>Editar</a></td>
                            <td>
                                <form id='form_pedido_{{$pedido->id}}' method='post' action='{{route('pedido.destroy', ['pedido'=>$pedido->id])}}'>
                                    @csrf
                                    @method('DELETE')
                                    <a href=# onclick="document.getElementById('form_pedido_{{$pedido->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
                {{ $pedidos->appends($request->all())->links() }} 
                <p>Exibindo {{ $pedidos->count() }} pedidos de {{$pedidos->total()}} ({{$pedidos->firstitem()}} ao {{$pedidos->lastitem()}})</p>
            </div>
        </div>

    </div>
    
@endsection