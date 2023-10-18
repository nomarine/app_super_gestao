@extends('app.layouts.basico') 

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            @if(isset($produto->id))
                <p>Edição de Produto</p>
            @else
                <p>Cadastro de Produtos</p>
            @endif
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            @include('app.produto.layouts._components.form_cadastrar')
        </div>

    </div>
    
@endsection