{{-- $pedidos->appends(request()->query())->links() --}}
<table class="table table-striped">
    <thead>
        <tr> 
          <th><h4>Número USP</h4></th>
          <th><h4>Nome</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Instituição</h4></th>
          <th><h4>Status</h4></th>
          <th><h4>Data que foi para Análise<th><h4>
        </tr>
    </thead>

    <tbody>
      @foreach($pedidos as $pedido)
        <tr>
          <td><a href="/pedidos/{{$pedido->id}}">{{$pedido->user->codpes}}</a></td>
          <td>{{$pedido->nome}}</td>
          <td>{{$pedido->curso}}</td>
          <td>{{$pedido->instituicao}}</td>
          <td>{{$pedido->status}}</td>
          <td>
          @if($pedido->status != 'Em elaboração')
            alterar
          @endif
          </td>
          <td>
              <form method="POST" action="/pedidos/{{$pedido->id}}"> 
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  {{-- $pedidos->appends(request()->query())->links() --}}