@extends('main')
@section('content')

{!! $stepper !!}

<h2>Obrigatórias</h2>
<table width=100% class="table table-bordered">
  <thead>
    <tr align="center">
    <th scope="col">Nome</th>   
    <th scope="col">Nota</th>
    <th scope="col">Carga Horária Semestral</th>
    <th scope="col">Ementa</th>
    <th scope="col">Parecer</th>
    </tr>
  </thead>

  <tbody>
    @foreach($pedido->disciplinas->sortBy('tipo') as $disciplina)
      <tr>
        @if($disciplina->tipo == 'Obrigatória')
          <td>{{ $disciplina->nome }}</td>
          <td align="center">{{ $disciplina->nota }}</td>
          <td align="center">{{ $disciplina->carga_horaria }}</td>
          <td align="center">
            @if(!empty($disciplina->path))
              <a href="/disciplinas/{{ $disciplina->id }}/showfile"><i class="far fa-file-pdf"></i></a> 
            @endif
          </td>

          <td align="center">
            @if(empty ($disciplina->codpes_docente))
              <form method="post" action="salvardocente/{{ $disciplina->id }}">
                @csrf
                <select class="form-control" name="codpes_docente">
                  <option value="" selected="">- Selecione -</option>
                  @foreach ($docentes as $docente)
                    <option value="{{ $docente['codpes'] }}" @if(old('codpes') == $docente['codpes']) ) selected @endif>
                      {{ $docente['nompes'] }}
                    </option>
                  @endforeach
                </select>

                <div class="form-group">
                  <button type="submit" onclick="return confirm('Tem certeza que deseja enviar para docente? ');" class="btn btn-success">
                    <br>Enviar para docente
                  </button>
                </div>
              </form>
            @else
                {{ $nome_docente[$disciplina->codpes_docente] }}
            @endif
          </td>
        @endif  
      </tr>
    @endforeach
  </tbody>
</table>

<h2>Optativas</h2>
<table width=100% class="table table-bordered">
  <thead>
    <tr align="center">
      <th scope="col">Nome</th>   
      <th scope="col">Nota</th>
      <th scope="col">Carga Horária Semestral</th>
      <th scope="col">Ementa</th>
      <th scope="col">Tipo</th>
      <th scope="col">Créditos</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pedido->disciplinas->sortBy('tipo') as $disciplina)
      <tr>
          @if($disciplina->tipo != 'Obrigatória')
            <td>{{ $disciplina->nome }}</td>
            <td align="center">{{ $disciplina->nota }}</td>
            <td align="center">{{ $disciplina->carga_horaria }}</td>
            <td align="center">
                @if(!empty($disciplina->path))
                <a href="/disciplinas/{{ $disciplina->id }}/showfile"><i class="far fa-file-pdf"></i></a> 
                @endif
            </td>
            <td align="center">{{ $disciplina->tipo }}</td>
            <td align="center">{{ $disciplina->conversao}}</td>
          @endif  
      </tr>
    @endforeach
  </tbody>
</table>

<button class="btn btn-success" type="submit"> Deferir todas as disciplinas</button>



<form method="POST" action="/update_status_pedido/{{$pedido->id}}">
    @csrf
    <input type="hidden" name="status" value="Análise">
    <br>
    Comentário (Obrigatório)
    <textarea  class="form-control" rows="3" name="comentario"></textarea>
    <br>    
    <div class="row">
        <div class="form-group">
            <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para análise (ccint)? ');" class="btn btn-danger p-2">
            Retornar o pedido para análise (ccint)
            </button>
        </div>
    </div>
</form>

@endsection