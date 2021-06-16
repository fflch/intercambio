@extends('main')

@section('content')

<form method="get">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Busca somente por número USP do/a aluno/a">

    @inject('pedido','App\Models\Pedido')

    <select name="buscastatus" class="form-control">
        <option value="" selected=""> Status </option>
        @foreach($pedido->getStatus() as $key=>$status)

          <option value="{{$key}}" name="buscastatus" 
          @if($key == Request()->buscastatus) selected @endif 
          >{{$status['name']}}</option>

        @endforeach
    </select>

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>

<div class="card">
<br>
  <table class="table table-striped">
    <thead>
        <tr> 
          <th><h4>Número USP</h4></th>
          <th><h4>Nome</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Instituição</h4></th>
          <th><h4>Status</h4></th>
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
</div>
<br>
{{ $pedidos->appends(request()->query())->links() }}
@endsection