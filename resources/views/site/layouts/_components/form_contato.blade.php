{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class={{ $classe }} value="{{ $contato_faker['nome'] }}"> <!-- old('nome') -->
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class={{ $classe }} value="{{ $contato_faker['telefone'] }}"> <!-- {{ old('telefone') }} -->
    <br>
    <input name="email" type="text" placeholder="E-mail" class={{ $classe }} value="{{ $contato_faker['email'] }}"><!-- { old('email') }} -->
    <br>
    <select name="motivo_contato" class={{ $classe }}> <!-- {{ old('motivo_contato') }} -->
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivos_contato as $key => $motivo_contato)
            <option value={{$key}} {{ $contato_faker['motivo_contato'] == $key ? 'selected' : '' }}>{{ $motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class={{ $classe }} placeholder="Preencha aqui a sua mensagem">{{ $contato_faker['mensagem'] }}</textarea> <!-- {{ old('mensagem') }} -->
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>

@if(session()->has('sucesso'))
<div style="position: absolute; background-color: green; top: 0px; left: 0px; width: 100%; height: 25px; content-align: center">
        {!! \Session::get('sucesso') !!}
        <p>Agradecemos o seu contato!</p>
        <p>:D</p>
</div>
@endif

@if($errors->any())
    <div style="position: absolute; background-color: red; top: 0px; left: 0px; width: 100%">
        <pre>
            @foreach ($errors->all() as $message) 
                {{ $message }}
            @endforeach
        </pre>
    </div>
@endif
