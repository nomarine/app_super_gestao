<div class="form-fornecedor">
    {{ $msg }}   
    <form method="post" action={{ route('app.fornecedor.cadastrar') }}>
        @csrf
        <input name="nome" type="text" value="{{ old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input name="site" type="text" value="{{ old('site') }}" placeholder="Site" class="borda-preta">
        {{ $errors->has('site') ? $errors->first('site') : '' }}

        <input name="uf" type="text" value="{{ old('uf') }}" placeholder="UF" class="borda-preta">
        {{ $errors->has('uf') ? $errors->first('uf') : '' }}

        <input name="email" type="text" value="{{ old('email') }}" placeholder="E-mail" class="borda-preta">
        {{ $errors->has('email') ? $errors->first('email') : '' }}

        <button type="submit">Cadastrar</button>
    </form>
</div>
