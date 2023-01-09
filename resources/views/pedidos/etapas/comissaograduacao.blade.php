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
                    @if(empty ($disciplina->codpes_docente))
                      Enviar para docente
                    @else
                      Enviado para: {{ $nome_docente[$disciplina->codpes_docente] }}
                      <button type="submit" onclick="return confirm('Tem certeza que deseja enviar para docente? ');" class="btn btn-success">Enviar para docente</button>
                    @endif
              
                  
                </div>
              </form>

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

<br>

<form method="POST" action="/update_status_pedido/{{$pedido->id}}">
  @csrf
  <input type="hidden" name="status" value="Serviço de Graduação">
  <button type="submit" onclick="return confirm('Tem certeza que deseja enviar para comissão de graduação? ');" class="btn btn-success p-2">
    Enviar TODAS disciplinas para cadastro no Serviço de Graduação
  </button>
</form>


<form method="POST" action="/update_status_pedido/{{$pedido->id}}">
    @csrf
    <input type="hidden" name="status" value="Análise">
    <br>
    Comentário (Obrigatório)

    <textarea  class="form-control" rows="3" name="comentario"></textarea>
    <br>    
    <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para análise (ccint)? ');" class="btn btn-danger p-2">
      Retornar o pedido para análise (ccint)
    </button>
</form>

@endsection