@extends('main')

@section('content')

<center> 
  <form method="POST" action="/instituicao/{{$instituicao->id}}"> 
    @csrf 
    @method('patch')
    <label for="nome_instituicao"><b>Atualizar o nome da Instituição</b></label>
    <br>  
    <input name="nome_instituicao" style="width:800px" value="{{old('nome_instituicao', $instituicao->nome_instituicao )}}"></input>
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
  </form>
</center> 

@endsection