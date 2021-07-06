<h3>Fornecedores</h3>

{{-- @dd($fornecedores) --}}

{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores</h3> 
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif --}}

@isset($fornecedores[4])
    Fornecedor: {{ $fornecedores[4]['nome'] }}
    @unless($fornecedores[4]['status'] == 'A')
        <br>
        Status: {{ $fornecedores[4]['status'] }}
    @endunless
    @isset($fornecedores[4]['cnpj'])
        <br>
        CNPJ: 
        @empty($fornecedores[4]['cnpj'])
                Não informado
            @else
                {{ $fornecedores[4]['cnpj'] }}
        @endempty
    @endisset
@endisset

{{-- @unless($fornecedores) --}}

