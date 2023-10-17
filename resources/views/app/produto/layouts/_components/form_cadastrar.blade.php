<div class="form-cadastro">
    <form method="post" action="{{route('produto.store')}}">
        @csrf
        <input name="nome" type="text" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input name="descricao" type="text" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input name="peso" type="text" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
        {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id"> 
            <option disabled selected value=""><----- Selecione a unidade -----></option>
            @foreach($unidades as $unidade)
                <option value={{ $unidade->id }} {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        <button type="submit">Cadastrar</button>
    </form>
</div>
