@extends('main')

@section('content')

  <form method="POST" action="/pedidos/{{$pedido->id}}">
    @csrf
    @method('patch')
    @include('pedidos.form')
   
  </form> 
@endsections