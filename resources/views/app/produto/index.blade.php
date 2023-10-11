@extends('app.layouts.basico') 

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Produtos</p>
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            <div class="tabela-fornecedor">
                <table border=1 width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>ID da Unidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td><a href=''>Editar</a></td>
                            <td><a href=''>Excluir</a></td>
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