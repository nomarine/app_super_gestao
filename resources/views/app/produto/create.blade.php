@extends('app.layouts.basico') 

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Cadastro de Produtos</p>
        </div>

        @include('app.produto.layouts._partials.menu')

        <div class="informacao-pagina">
            @component('app.produto.layouts._components.form_create_edit', ['unidades'=>$unidades])
            @endcomponent
        </div>

    </div>
    
@endsection