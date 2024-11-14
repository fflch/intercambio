@extends('main')

@section('content')
 {{ $relatorios->appends(request()->query())->links() }}
<h2>Relatórios Aprovados</h2>
<table class="table table-striped">
    <thead>
        <tr>
          <th><h4>Nome</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Período</h4></th>
          <th><h4>País</h4></th>
          <th><h4>Instituição</h4></th>
        </tr>
    </thead>
    <tbody>
      @foreach($relatorios as $relatorio)
        <tr>
          <td>
            @if(in_array($relatorio->autorizacao, ['simnome', 'simnomecontato']))
              <a href="/relatorios/{{ $relatorio->id }}/publico">{{ $relatorio->pedido->nome }}</a>
            @elseif($relatorio->autorizacao === 'sim')
              <a href="/relatorios/{{ $relatorio->id }}/publico">Aluno Anônimo</a>
            @else
              <span>N/A</span>
            @endif
          </td>
          <td>{{ $relatorio->pedido->curso }}</td>
          <td>{{ $relatorio->periodo }}</td>
          <td>{{ $relatorio->pedido->instituicao->country->nome }}</td>
          <td>{{ $relatorio->pedido->instituicao->nome_instituicao }}</td>
        </tr>
      @endforeach
    </tbody>
</table>
{{ $relatorios->appends(request()->query())->links() }}
@endsection
