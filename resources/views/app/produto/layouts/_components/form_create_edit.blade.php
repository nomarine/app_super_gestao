<div class="form-cadastro">
    @if(isset($produto->id))
        <form method="post" action="{{route('produto.update', ['produto'=>$produto->id])}}">
        @method('PUT')
    @else
        <form method="post" action="{{route('produto.store')}}">
    @endif
    @csrf
        <select name="fornecedor_id"> 
            <option disabled selected value=""><----- Selecione o fornecedor -----></option>
            @foreach($fornecedores as $fornecedor)
                <option value={{ $fornecedor->id }} {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : ''}}>{{ $fornecedor->nome }}</option>
            @endforeach
        </select>
        {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

        <input name="nome" type="text" value="{{ $produto->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input name="descricao" type="text" value="{{ $produto->descricao ?? old('descricao') }}" placeholder="Descrição" class="borda-preta">
        {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}

        <input name="peso" type="text" value="{{ $produto->peso ?? old('peso') }}" placeholder="Peso" class="borda-preta">
        {{ $errors->has('peso') ? $errors->first('peso') : '' }}

        <select name="unidade_id"> 
            <option disabled selected value=""><----- Selecione a unidade de medida -----></option>
            @foreach($unidades as $unidade)
                <option value={{ $unidade->id }} {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>
        {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

        @if(isset($produto->id))
            <button type="submit">Salvar alterações</button>
        @else
            <button type="submit">Cadastrar</button>
        @endif
    </form>
</div>
