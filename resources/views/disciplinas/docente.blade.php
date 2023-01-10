@extends('main')

@section('content')

  <table class="table table-striped">
    <thead>
        <tr> 
          <th><b>Número USP</b></th>
          <th><b>Nome discente</b></th>
          <th><b>Curso</b></th>
          <th><b>Instituição</b></th>
          <th><b>Disciplina</b></th>
          <th><b>Parecer</b></th>
        </tr>
    </thead>

    <tbody>
      @foreach($disciplinas as $disciplina)
        <tr>
          <td>{{ $disciplina->pedido->user->codpes }}</td>
          <td>{{ $disciplina->pedido->nome }}</td>
          <td>{{ $disciplina->pedido->curso }}</td>
          <td>{{ $disciplina->pedido->instituicao->nome_instituicao }}</td>
          <td>{{ $disciplina->codigo }} - {{ $disciplina->nome }}</td>
          <td> <a href="/show_parecer/{{ $disciplina->id }}" class="btn btn-success"> Dar parecer </a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
@endsection
