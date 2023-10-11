<div class="form-cadastro">
    <form method="post" action="">
        @csrf
        <input name="nome" type="text" value="" placeholder="Nome" class="borda-preta">

        <input name="descricao" type="text" value="" placeholder="Descrição" class="borda-preta">

        <input name="peso" type="text" value="" placeholder="Peso" class="borda-preta">

        <select name="unidade_id"> 
            <option><----- Selecione a unidade -----></option>
            @foreach($unidades as $unidade)
                <option value={{ $unidade->id }}>{{ $unidade->descricao }}</option>
            @endforeach
        </select>

        <button type="submit">Cadastrar</button>
    </form>
</div>
