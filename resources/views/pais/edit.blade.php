@extends('main')

@section('content')

<center> 
  <form method="POST" action="/pais/{{$pais->id}}"> 
    @csrf 
    @method('patch')
    <label for="nome"><b>Atualizar o nome do País</b></label>
    <br>  
    <input name="nome" value="" style="width:800px" value="{{$pais->nome}}"></input>
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
  </form>
</center> 

@endsection