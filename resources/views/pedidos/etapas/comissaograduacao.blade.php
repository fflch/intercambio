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

              <select class="form-control" name="docente">
                    <option value="" selected="">- Selecione -</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente['codpes'] }}">
                          {{ $docente['nompes'] }}
                        </option>
                    @endforeach
                </select>

              <button class="btn btn-success" type="submit"> Enviar para docente </button>
            </td>
          @endif  
      </tr>
    @endforeach
  </tbody>
</table>

<button class="btn btn-success" type="submit"> Deferir todas obrigatórias</button>
<br><br>

<h2>Optativas</h2>
<table width=100% class="table table-bordered">
  <thead>
    <tr align="center">
      <th scope="col">Nome</th>   
      <th scope="col">Nota</th>
      <th scope="col">Carga Horária Semestral</th>
      <th scope="col">Ementa</th>
      <th scope="col">Tipo</th>
      <th scope="col">Créditos Convertidos</th>
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
            <td align="center">{{ $disciplina->creditos_convertidos}}</td>
          @endif  
      </tr>
    @endforeach
  </tbody>
</table>

<button class="btn btn-success" type="submit"> Deferir todas optativas</button>



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