@extends('main')
@section('content')
<ul>
  <li>{{ $pedido->codpes ?? '' }}</a></li>
  <li>{{ $pedido->curso ?? '' }}</li>
  <li>{{ $pedido->instituicao ?? '' }}</li>
  <li><a href="/pedidos/{{$pedido->id}}/edit">Editar</a></li>

</ul>
@endsection  