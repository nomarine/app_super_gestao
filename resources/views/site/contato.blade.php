@extends('site.layouts.rodape')

@section('titulo', $titulo)

@section('conteudo')
    <div class="topo">

        <div class="logo">
            <img src="img/logo.png">
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('site.index') }}">Principal</a></li>
                <li><a href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                <li><a href="{{ route('site.contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                <form>
                    <input type="text" placeholder="Nome" class="borda-preta">
                    <br>
                    <input type="text" placeholder="Telefone" class="borda-preta">
                    <br>
                    <input type="text" placeholder="E-mail" class="borda-preta">
                    <br>
                    <select class="borda-preta">
                        <option value="">Qual o motivo do contato?</option>
                        <option value="">Dúvida</option>
                        <option value="">Elogio</option>
                        <option value="">Reclamação</option>
                    </select>
                    <br>
                    <textarea class="borda-preta">Preencha aqui a sua mensagem</textarea>
                    <br>
                    <button type="submit" class="borda-preta">ENVIAR</button>
                </form>
            </div>
        </div>  
    </div>
@endsection