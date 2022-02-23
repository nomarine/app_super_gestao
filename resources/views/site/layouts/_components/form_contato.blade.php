{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class={{ $classe }} value={{ old('nome') }}>
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class={{ $classe }} value={{ old('telefone') }}>
    <br>
    <input name="email" type="text" placeholder="E-mail" class={{ $classe }} value={{ old('email') }}>
    <br>
    <select name="motivo_contato" class={{ $classe }} value={{ old('motivo_contato') }}>
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class={{ $classe }} placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>

@if(session()->has('sucesso'))
<div style="position: absolute; background-color: green; top: 0px; left: 0px; width: 100%; height: 25px; content-align: center">
        {!! \Session::get('sucesso') !!}
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
