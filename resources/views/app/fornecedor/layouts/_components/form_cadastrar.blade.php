<div class="form-fornecedor">    
    <form method="post" action={{ route('app.fornecedor.cadastrar') }}>
        @csrf
        <input name="nome" type="text" placeholder="Nome" class="borda-preta">
        <input name="site" type="text" placeholder="Site" class="borda-preta">
        <input name="uf" type="text" placeholder="UF" class="borda-preta">
        <input name="email" type="text" placeholder="E-mail" class="borda-preta">

        <button type="submit">Cadastrar</button>
    </form>
</div>
