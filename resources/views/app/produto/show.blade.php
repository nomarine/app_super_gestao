@extends('app.layouts.basico') 

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Informações do Produto</p>
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            <table class="tabela-produto">
                <tr>
                    <td>ID</td>
                    <td>{{$produto->id}}</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>{{$produto->nome}}</td>
                </tr>
                <tr>
                    <td>Descrição</td>
                    <td>{{$produto->descricao}}</td>
                </tr>
                <tr>
                    <td>Peso (kg)</td>
                    <td>{{$produto->peso}}</td>
                </tr>
                <tr>
                    <td>Unidade</td>
                    <td>{{$produto->unidade_id}}</td>
                </tr>
            </table>  
        </div>

    </div>
    
@endsection