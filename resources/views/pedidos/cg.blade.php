@extends('main')

@section('content')

<table class="table table-striped">
    <thead>
        <tr> 
          <th><h4>Número USP</h4></th>
          <th><h4>Nome</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Instituição</h4></th>
          <th><h4>Status</h4></th>
          <th><h4>Última atualização do status em<th><h4>
        </tr>
    </thead>

    <tbody>
      @foreach($pedidos as $pedido)
        <tr>
          <td><a href="/pedidos/{{$pedido->id}}">{{$pedido->user->codpes}}</a></td>
          <td>{{$pedido->nome}}</td>
          <td>{{$pedido->curso}}</td>
          <td>{{$pedido->instituicao->nome_instituicao}}</td>
          <td>{{$pedido->status}}</td>
          <td>
          @if($pedido->status != 'Em elaboração')
            {{\Carbon\Carbon::parse( $pedido->updated_at)->format('d/m/Y H:i') }}
          @endif
          </td>
          <td>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection