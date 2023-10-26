@extends('app.layouts.basico') 

@section('titulo', 'Pedidos')

@section('conteudo')
    <div class="conteudo-pagina">
    
        <div class="titulo-pagina-2">
            <p>Cadastro de Produtos ao Pedido</p>
        </div>

        @include('app.pedido.layouts._partials.menu')

        <div class="informacao-pagina">
            <div class="form-cadastro">
                <h4>Detalhes do Pedido</h4>
                <p>ID do Pedido: {{$pedido->id}}</p>
                <p>ID do Cliente: {{$pedido->cliente_id}}</p>

                <table width="100%" border=1>
                    <thead>
                        <th>ID do Produto</th>
                        <th>Nome do Produto</th>
                        <th>Data de Inclusão</th>
                        <th></th>
                    </thead>

                    <tbody>
                        @foreach($pedido->produtos as $produto)
                        <tr>
                            <td>{{$produto->id}}</td>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->pivot->created_at->format('d/m/Y')}}</td>
                            <td>
                                <form id='form_{{$produto->pivot->id}}' method="post" action='{{route('pedido-produto.destroy', ['pedidoProduto'=>$produto->pivot->id])}}'>
                                    @csrf
                                    @method('DELETE')
                                    <a href=# onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">
                                        Excluir
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
                <form method="post" action="{{route('pedido-produto.store', ['pedido'=>$pedido->id])}}">
                @csrf
                    <select name="produto_id"> 
                        <option selected value=""><----- Selecione o produto -----></option>
                        @foreach($produtos as $produto)
                            <option value={{ $produto->id }} {{ ($pedido->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : ''}}>{{ $produto->nome }}</option>
                        @endforeach
                    </select>
                    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

                    <input type='number' name='quantidade' placeholder='Quantidade' value={{$produto->quantidade ?? old('quantidade')}}>
                    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
            
                    @if(isset($produto->id))
                        <button type="submit">Salvar alterações</button>
                    @else
                        <button type="submit">Cadastrar</button>
                    @endif
                </form>
            </div>
        </div>

    </div>
    
@endsection