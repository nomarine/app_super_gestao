<div class="form-fornecedor">
    {{ $msg ?? '' }}   
    <form method="post" action={{ route('app.fornecedor.cadastrar') }}>
        @csrf
        <input hidden name="id" value="{{ $fornecedor->id  ?? '' }}">

        <input name="nome" type="text" value="{{ $fornecedor->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}

        <input name="site" type="text" value="{{ $fornecedor->site ?? old('site') }}" placeholder="Site" class="borda-preta">
        {{ $errors->has('site') ? $errors->first('site') : '' }}

        <input name="uf" type="text" value="{{ $fornecedor->uf ?? old('uf') }}" placeholder="UF" class="borda-preta">
        {{ $errors->has('uf') ? $errors->first('uf') : '' }}

        <input name="email" type="text" value="{{ $fornecedor->email ?? old('email') }}" placeholder="E-mail" class="borda-preta">
        {{ $errors->has('email') ? $errors->first('email') : '' }}

        <button type="submit">Cadastrar</button>
    </form>
</div>
