@extends('app.layouts.basico') 

@section('titulo', 'Clientes')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Edição do Cliente</p>
        </div>

        @include('app.cliente.layouts._partials.menu')

        <div class="informacao-pagina">
            @component('app.cliente.layouts._components.form_create_edit', ['cliente'=>$cliente])
            @endcomponent
        </div>

    </div>
    
@endsection