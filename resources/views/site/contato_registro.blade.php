@extends('site.layouts.basico') 

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Agradecemos o seu contato!</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <p>Nome: {{ session('contato')->nome }}</p>
                <p>Telefone: {{ session('contato')->telefone }}</p>
                <p>E-mail: {{ session('contato')->email }}</p>
                <p>Motivo: {{ $motivo_desc->motivo_contato }}</p>
                <p>Mensagem: {{ session('contato')->mensagem }}</p>
             </div>
        </div>  

        <a href="{{ route('site.index') }}" type="button">
            <button class="btn-home-md" type="button" value="">
            Retornar para Home
            </button>
        </a>
    </div>

    @if(session()->has('sucesso'))
        <div style="position: absolute; background-color: green; top: 65px; left: 0px; width: 100%; height: 50px; text-align: center">
                <p> {!! \Session::get('sucesso') !!} </p>
        </div>
    @endif

@endsection

