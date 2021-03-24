@extends('main')

@section('content')

  <form method="POST" action="/Discente/{{$discente->id}}">
    @csrf
    @method('patch')
    @include('discente.formDoc')
   
  </form> 
@endsections