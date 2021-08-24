@extends('site.layouts.basico') 

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato', ['classe' => 'borda-preta'])
                    <p>Agradecemos o seu contato!</p>
                    <p>:D</p>
                @endcomponent
            </div>
        </div>  
    </div>
    @include('site.layouts._partials.rodape')
@endsection