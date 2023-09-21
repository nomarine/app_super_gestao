@extends('app.layouts.basico') 

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Consulta de Fornecedores</p>
        </div>

        @include('app.fornecedor.layouts._partials.menu')

        <div class="informacao-pagina">
            @include('app.fornecedor.layouts._components.form_consultar')
        </div>

    </div>
    
@endsection