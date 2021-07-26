@extends('main')

@section('content')

<center> 
  <form method="POST" action="/country/{{$country->id}}"> 
    @csrf 
    @method('patch')
    <label for="nome"><b>Atualizar o nome do País</b></label>
    <br>  
    <input name="nome" style="width:800px" value="{{old('nome', $country->nome )}}"></input>
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
  </form>
</center> 

@endsection