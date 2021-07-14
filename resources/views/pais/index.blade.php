@extends('main')

@section('content')

<script>

</script>

<center> 
<form method="POST" action="/instituicao"> 
@csrf
    <label for="pais_id"><b>Lista de Países</b></label><br> 
    <select id="pais_id" name="pais_id">
        @foreach($paises as $pais)
            <option id="pais_id" name="pais_id" value="{{ $pais['id'] }}"> 
                {{ $pais['nome'] }} 
            </option>
        @endforeach
    </select> 
        <br><br>
    <div> 
        <label for="nome_instituicao"><b>Adcionar nome de Instituição</b></label><br>  
        <input name="nome_instituicao" value="" style="width:800px"></input>
        <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
    </div>
</form>
</center> 
<br> 

<div class="container" >
  <div class="row">  
    <div class="col-12" >
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col" style="width:15px">Excluir</th>
          </tr>
        </thead>
        <tbody>  
          <tr>
            <td> 
            @foreach($pais->instituicao as $insti)
            {{ $insti->nome_instituicao }}
            @endforeach
            </td>
            <td> 
                <form method="POST" action="/instituicoes"> 
                    @csrf
                    @method('delete')
                    <center>
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
                    <center>
                </form>  
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection