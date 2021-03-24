@extends('main')

@section('content')

  <form method="POST" action="/DiscenteOpt">
    @csrf
    @include('discenteOpt.form')
  </form>
@endsection