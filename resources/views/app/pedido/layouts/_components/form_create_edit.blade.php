<div class="form-cadastro">
    @if(isset($pedido->id))
        <form method="post" action="{{route('pedido.update', ['pedido'=>$pedido->id])}}">
        @method('PUT')
    @else
        <form method="post" action="{{route('pedido.store')}}">
    @endif
    @csrf
        <select name="cliente_id"> 
            <option disabled selected value=""><----- Selecione o cliente -----></option>
            @foreach($clientes as $cliente)
                <option value={{ $cliente->id }} {{ ($pedido->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option>
            @endforeach
        </select>
        {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}

        @if(isset($pedido->id))
            <button type="submit">Salvar alterações</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif
    </form>
</div>
