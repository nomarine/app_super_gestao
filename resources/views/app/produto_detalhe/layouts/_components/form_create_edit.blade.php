<div class="form-cadastro">
    @if(isset($produto_detalhe->id))
        <form method="post" action="{{route('produto-detalhe.update', ['produto_detalhe'=>$produto_detalhe->id])}}">
        @method('PUT')
    @else
        <form method="post" action="{{route('produto-detalhe.store')}}">
    @endif
    @csrf
        <input name="produto_id" type="text" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
        {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

        <input name="altura" type="text" value="{{ $produto_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
        {{ $errors->has('altura') ? $errors->first('altura') : '' }}

        <input name="largura" type="text" value="{{ $produto_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
        {{ $errors->has('largura') ? $errors->first('largura') : '' }}

        <input name="comprimento" type="text" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
        {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

        <select name="unidade_id"> 
            <option disabled selected value=""><----- Selecione a unidade -----></option>
            @foreach($unidades as $unidade)
                <option value={{ $unidade->id }} {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        @if(isset($produto_detalhe->id))
            <button type="submit">Salvar alterações</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif
    </form>
</div>
