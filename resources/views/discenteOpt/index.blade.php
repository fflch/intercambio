@extends('main')

@section('content')



<form method="get" action="/Opt">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}">

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success"> Buscar </button>
    </span>

    </div>
</div>
</form>
<br>

<div class="card">

  <table class="table table-striped">
    <thead>
        <tr>
          <th><h3>Requisições Optativas</h3></th>
        </tr>
        <tr> 
          <th><h4>Nome</h4></th>
          <th><h4>nUSP</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Infos</h4></th>
          <th><h4>Resposta</h4></th>
        </tr>
    </thead>

    <tbody>
      @foreach ($discenteOpt as $discOpt)
      
        <tr>
          <td><a href="/DiscenteOpt/{{$discOpt->id}}">{{$discOpt->Nome}}</a></td>
          <td>{{$discOpt->nUSP}}</td>
          <td>{{$discOpt->Curso}}</td>
          <td>
          Instituicao intercambio : {{$discOpt->Instituicao}}<br>
          Nome da disciplina : {{$discOpt->NomeDisciplina}}<br>
          Credito : {{$discOpt->Credito}}<br>
          Carga Horaria : {{$discOpt->CargaHoraria}}<br>
          Data Inicial : {{$discOpt->DataInicial}} <br>
          Data Final : {{$discOpt->DataFinal}} <br>
          Modalidade : {{$discOpt->Modalidade}} <br>
          </td>
          <td>
              
              <form method="POST" action="/DiscenteOpt/{{ $discOpt->id }}">
  
                @csrf
                @method('delete')
                <a href="/DiscenteOpt/{{$discOpt->id}}/edit"><i class="fas fa-pencil-alt"></a></i>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
            </form>

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>



{{ $discenteOpt->appends(request()->query())->links() }}

@endsection


 