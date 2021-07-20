@extends('main')

@section('content')

<center> 
  <form method="POST" action="/pais"> 
  @csrf 
    <label for="nome"><b>Adcionar um País</b></label>
    <br>  
    <input name="nome" value="" style="width:800px"></input>
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
  </form>
</center> 
<br> 

<div class="container" >
  <div class="row">  
    <div class="col-12" >
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"><h3>Nome</h3></th>
            <th scope="col" style="width:15px"><h3>Alterações</h3></th>
          </tr>
        </thead>
        
        <tbody>
        @foreach($paises->sortBy('nome') as $pais)  
          <tr>
            <td> <a href="pais/{{ $pais->id }}/"> {{ $pais->nome }} </td>
            <td> 
                <center>
                <a href="pais/{{ $pais->id }}/edit" style="background-color: transparent;border: none;">
                    <i class="fas fa-pencil-alt" color="#007bff"></i>
                  </button>
                </a>  
                    <form method="POST" action="/pais/{{$pais->id}}"> 
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>   
                    </form>  
                </center>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection