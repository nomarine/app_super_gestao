<div class="form-cadastro">
    @if(isset($cliente->id))
        <form method="post" action="{{route('cliente.update', ['cliente'=>$cliente->id])}}">
        @method('PUT')
    @else
        <form method="post" action="{{route('cliente.store')}}">
    @endif
    @csrf
        <input name="nome" type="text" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        @if(isset($cliente->id))
            <button type="submit">Salvar alterações</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif
    </form>
</div>
