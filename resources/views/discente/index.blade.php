@extends('main')

@section('content')



<form method="get" action="/Obg">
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
          <th><h3>Requisições Obrigatorias</h3></th>
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
      @foreach ($discentes as $disc)
        <tr>
          <td><a href="/Discente/{{$disc->id}}">{{$disc->Nome}}</a></td>
          <td>{{$disc->nUSP}}</td>
          <td>{{$disc->Curso}}</td>
          <td>
          Instituicao intercambio : {{$disc->Instituicao}}<br>
          Nome da disciplina : {{$disc->NomeDisciplina}}<br>
          Nota : {{$disc->Nota}}<br>
          Credito : {{$disc->Credito}}<br>
          Carga Horaria : {{$disc->CargaHoraria}}<br>
          </td>
          <td>
              
              <form method="POST" action="/Discente/{{$disc->id}}"> 
                @csrf
                @method('delete')
                <a href="/Discente/{{$disc->id}}/edit"><i class="fas fa-pencil-alt"></a></i>
                <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
            </form>

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{ $discentes->appends(request()->query())->links() }}
@endsection