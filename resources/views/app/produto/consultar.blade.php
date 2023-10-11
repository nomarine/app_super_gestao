@extends('app.layouts.basico') 

@section('titulo', 'produto')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de produtos</p>
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            <div class="tabela-produto">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>E-mail</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->site}}</td>
                            <td>{{$produto->uf}}</td>
                            <td>{{$produto->email}}</td>
                            <td><a href={{ route('app.produto.editar', $produto->id) }}>Editar</a></td>
                            <td><a href={{ route('app.produto.excluir', $produto->id) }}>Excluir</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
                {{ $produtos->appends($request->all())->links() }} 
                <p>Exibindo {{ $produtos->count() }} produtos de {{$produtos->total()}} ({{$produtos->firstitem()}} ao {{$produtos->lastitem()}})</p>
            </div>
        </div>

    </div>
    
@endsection