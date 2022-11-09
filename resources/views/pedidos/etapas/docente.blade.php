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
    @endforeach
</tbody>
</table>