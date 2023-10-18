@extends('app.layouts.basico') 

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Edição do Detalhamento do Produto</p>
        </div>

        @include('app.produto_detalhe.layouts._partials.menu')

        <div class="informacao-pagina">
            @component('app.produto_detalhe.layouts._components.form_create_edit', ['produto_detalhe'=>$produto_detalhe, 'unidades'=>$unidades])
            @endcomponent
        </div>

    </div>
    
@endsection