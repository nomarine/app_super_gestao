@extends('app.layouts.basico') 

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Clientes</p>
        </div>

        @include('app.cliente.layouts._partials.menu')
        <div class="informacao-pagina">
            <div class="tabela">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td><a href='{{route('cliente.show', ['cliente'=>$cliente->id])}}'>Ver</a></td>
                            <td><a href='{{route('cliente.edit', ['cliente'=>$cliente->id])}}'>Editar</a></td>
                            <td>
                                <form id ='form_pedido_{{$cliente->id}}' method="post" action='{{route('cliente.destroy', ['cliente'=>$cliente->id])}}'>
                                    @method('DELETE')
                                    @csrf
                                    <a href=# onclick="document.getElementById('form_pedido_{{$cliente->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
                {{ $clientes->appends($request->all())->links() }} 
                <p>Exibindo {{ $clientes->count() }} clientes de {{$clientes->total()}} ({{$clientes->firstitem()}} ao {{$clientes->lastitem()}})</p>
            </div>
        </div>

    </div>
    
@endsection