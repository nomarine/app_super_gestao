{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class={{ $classe }} value="{{ $contato_faker['nome'] ?? old('nome') }}"> <!-- old('nome') -->
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class={{ $classe }} value="{{ $contato_faker['telefone'] ?? old('telefone') }}"> <!-- {{ old('telefone') }} -->
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" type="text" placeholder="E-mail" class={{ $classe }} value="{{ $contato_faker['email'] ?? old('email') }}"><!-- { old('email') }} -->
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="motivo_contato" class={{ $classe }}> <!-- {{ old('motivo_contato') }} -->
        <option value="">Qual o motivo do contato?</option>
        @foreach($motivos_contato as $motivo_contato)
            <option value={{ $motivo_contato->id }}
                @if(@isset($contato_faker))
                    {{ $contato_faker['motivo_contato'] ==$motivo_contato->id ? 'selected' : '' }}
                @else
                    {{ old('motivo_contato') == $motivo_contato->id ? 'selected' : '' }}
                @endif
            >
                {{ $motivo_contato->motivo_contato }}
            </option>
        @endforeach
    </select>
    {{ $errors->has('motivo_contato') ? $errors->first('motivo_contato') : '' }}
    <br>
    <textarea name="mensagem" class={{ $classe }} placeholder="Preencha aqui a sua mensagem">{{ $contato_faker['mensagem'] ?? old('mensagem') }}</textarea> <!-- {{ old('mensagem') }} -->
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>

@if(session()->has('sucesso'))
<div style="position: absolute; background-color: green; top: 0px; left: 0px; width: 100%; height: auto; content-align: center">
        {!! \Session::get('sucesso') !!}
        <br>Agradecemos o seu contato!
        <br>=D
</div>
@endif

@if($errors->any())
    <div style="position: absolute; background-color: red; top: 0px; left: 0px; width: 100%">
            @foreach ($errors->all() as $message) 
                {{ $message }}<br>
            @endforeach
    </div>
@endif
