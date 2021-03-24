@extends('main')

@section('content')

  <form method="POST" action="/Discente">
    @csrf
    @include('discente.form')
  </form>
@endsection