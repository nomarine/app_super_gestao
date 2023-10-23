@extends('app.layouts.basico') 

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Informações do Produto</p>
        </div>

        @include('app.cliente.layouts._partials.menu')

        <div class="informacao-pagina">
            <table class="tabela">
                <tr>
                    <td>ID</td>
                    <td>{{$cliente->id}}</td>
                </tr>
                <tr>
                    <td>Nome</td>
                    <td>{{$cliente->nome}}</td>
                </tr>
            </table>  
        </div>

    </div>
    
@endsection