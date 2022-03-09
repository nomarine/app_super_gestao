@extends('site.layouts.basico') 

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Agradecemos o seu contato!</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <p>{{ session('id') }}</p>
                <p>Nome: {{ session('contato')->nome }}</p>
                <p>Telefone: {{ session('contato')->telefone }}</p>
                <p>E-mail: {{ session('contato')->email }}</p>
                <p>Motivo: {{ $motivo_desc->motivo_contato }}</p>
                <p>Mensagem: {{ session('contato')->mensagem }}</p>
             </div>
        </div>  
    </div>
@endsection