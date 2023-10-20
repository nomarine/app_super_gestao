<div class="form-consulta">
    <form method="post" action={{ route('app.fornecedor.consultar') }}>
        @csrf
        <input name="nome" type="text" placeholder="Nome" class="borda-preta">
        <input name="site" type="text" placeholder="Site" class="borda-preta">
        <input name="uf" type="text" placeholder="UF" class="borda-preta">
        <input name="email" type="text" placeholder="E-mail" class="borda-preta">

        <button type="submit">Consultar</button>
    </form>
</div>
