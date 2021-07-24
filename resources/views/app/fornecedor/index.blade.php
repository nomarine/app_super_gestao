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

    {{---@php $fornecedores = [] @endphp---}}
    
    @forelse($fornecedores as $indice => $fornecedor)
        @if($loop->first) {{ $loop->count }} fornecedores cadastrados. <hr> @endif
        Fornecedor: {{ $fornecedor['nome'] }}
        @unless($fornecedor['status'] == 'A')
            <br>
            Status: {{ $fornecedor['status'] }}
        @endunless
        <br>
        CNPJ: {{ $fornecedor['CNPJ'] ?? "Sem CNPJ" }}
        <br>
        Telefone: 
        @isset($fornecedor['ddd'])
            ({{ $fornecedor['ddd'] }}) {{ $fornecedor['telefone'] }}
            @else
                não cadastrado
        @endisset
        @isset($fornecedor['ddd'])
            @switch($fornecedor['ddd'])
                @case(12)
                    - Vale do Paraíba
                    @break
                @case(21)
                    - Rio de Janeiro
                    @break
                @case(718)
                    - New York
                    @break
                @default
                    - DDD não identificado
                    @break
            @endswitch
        @endisset    
        <hr>
        @if($loop->last) Fim dos registros. @endif

        @empty
            Sem fornecedores cadastrados.
    @endforelse

@endisset

{{-- @unless($fornecedoreses) --}}

