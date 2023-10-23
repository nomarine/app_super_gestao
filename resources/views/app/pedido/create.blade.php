@extends('app.layouts.basico') 

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Cadastro de Clientes</p>
        </div>

        @include('app.cliente.layouts._partials.menu')

        <div class="informacao-pagina">
            @component('app.cliente.layouts._components.form_create_edit')
            @endcomponent
        </div>

    </div>
    
@endsection