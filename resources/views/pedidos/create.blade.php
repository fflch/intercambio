@extends('main')

@section('content')

  <form method="POST" action="/pedidos">
    @csrf
    @include('pedidos.form')
  </form>
@endsection