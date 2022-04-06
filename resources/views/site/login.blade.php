@extends('site.layouts.basico') 

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto">
            <form action={{ route('site.login') }} method="post">
                @csrf
                <input type="text" name="login" placeholder="Login" value="{{ old('login') }}" class="borda-preta"/>
                {{ $errors->has('login') ? $errors->first('login') : '' }}
                <input type="password" name="senha" placeholder="Senha" value="{{ old('senha') }}" class="borda-preta"/>
                {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                <button type="submit">Entrar</button>
            </form>
            {{ isset($erro) && $erro != '' ? $erro : '' }}
            </div>
        </div>  
    </div>
@endsection
