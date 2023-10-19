@extends('app.layouts.basico') 

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Fornecedores</p>
        </div>

        @include('app.fornecedor.layouts._partials.menu')

        <div class="informacao-pagina">
            {{$fornecedores->toJson()}}
            <div class="tabela-fornecedor">
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
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{$fornecedor->nome}}</td>
                            <td>{{$fornecedor->site}}</td>
                            <td>{{$fornecedor->uf}}</td>
                            <td>{{$fornecedor->email}}</td>
                            <td><a href={{ route('app.fornecedor.editar', $fornecedor->id) }}>Editar</a></td>
                            <td><a href={{ route('app.fornecedor.excluir', $fornecedor->id) }}>Excluir</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de Produtos</p>
                                <table border=1 style="margin:20px">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($fornecedor->produtos as $key=>$produto)
                                            <tr>
                                                <td>{{$produto->id}}</td>
                                                <td>{{$produto->nome}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>  
                {{ $fornecedores->appends($request->all())->links() }} 
                <p>Exibindo {{ $fornecedores->count() }} fornecedores de {{$fornecedores->total()}} ({{$fornecedores->firstitem()}} ao {{$fornecedores->lastitem()}})</p>
            </div>
        </div>

    </div>
    
@endsection