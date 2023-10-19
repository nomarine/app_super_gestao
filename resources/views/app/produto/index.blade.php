@extends('app.layouts.basico') 

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Produtos</p>
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            <div>
                <table border=1 class="tabela-produto">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>ID da Unidade</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->fornecedor->nome}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                            <td>{{$produto->itemDetalhe->largura ?? ''}}</td>
                            <td><a href={{ route('produto.show', ['produto'=>$produto->id]) }}>Ver</a></td>
                            <td><a href={{ route('produto.edit', ['produto'=>$produto->id]) }}>Editar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" method="post" action="{{route('produto.destroy', ['produto'=>$produto->id])}}"">
                                    @method('DELETE')
                                    @csrf
                                    {{-- <button type=submit>Excluir</button> --}}
                                    <a href=# onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a></td>
                                </form>
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