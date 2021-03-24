@extends('main')
@section('content')

  <form method="POST" action="/DiscenteOpt/{{$discenteOpt->id}}">
    @csrf
    @method('patch')
    @include('discenteOpt.formDoc')
   
  </form> 
@endsections