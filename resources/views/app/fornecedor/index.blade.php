<h3>Fornecedores</h3>

{{-- @dd($fornecedoreses) --}}

{{-- @if(count($fornecedoreses) > 0 && count($fornecedoreses) < 10)
    <h3>Existem alguns fornecedoreses</h3> 
@elseif(count($fornecedoreses) > 10)
    <h3>Existem vários fornecedoreses</h3>
@else
    <h3>Não existem fornecedoreses cadastrados</h3>
@endif --}}

@isset($fornecedores)
    
    @for($i = 0; isset($fornecedores[$i]); $i++) 
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        @unless($fornecedores[$i]['status'] == 'A')
            <br>
            Status: {{ $fornecedores[$i]['status'] }}
        @endunless
        <br>
        CNPJ: {{ $fornecedores[$i]['CNPJ'] ?? "Sem CNPJ" }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? "()" }}) {{ $fornecedores[$i]['telefone'] ?? "0000-0000" }} - 
        @isset($fornecedores[$i]['ddd'])
            @switch($fornecedores[$i]['ddd'])
                @case(12)
                    Vale do Paraíba
                    @break
                @case(21)
                    Rio de Janeiro
                    @break
                @case(718)
                    New York
                    @break
                @default
                    DDD não identificado
                    @break
            @endswitch
        @endisset
        <hr>
    @endfor
@endisset

{{-- @unless($fornecedoreses) --}}

