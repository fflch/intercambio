@extends('main')

@section('content')
<h2>Relatório para Aprovação</h2>
{{ $relatorios->appends(request()->query())->links() }}
<table class="table table-striped">
    <thead>
        <tr>
          <th><h4>&#8470 USP</h4></th>
          <th><h4>Nome</h4></th>
          <th><h4>Curso</h4></th>
          <th><h4>Período</h4></th>
          <th><h4>País</h4></th>
          <th><h4>Instituição</h4></th>
          <th><h4>Aprovação</h4></th>
        </tr>
    </thead>
    <tbody>
      @foreach($relatorios as $relatorio)
        <tr>
          <td><a href="/relatorios/{{ $relatorio->id }}/admin">{{ $relatorio->pedido->codpes }}</a></td>
          <td>{{ $relatorio->pedido->nome }}</td>
          <td>{{ $relatorio->pedido->curso }}</td>
          <td>{{ $relatorio->periodo }}</td>
          <td>{{ $relatorio->pedido->instituicao->country->nome }}</td>
          <td>{{ $relatorio->pedido->instituicao->nome_instituicao }}</td>
          <td>
            <button class="btn approval-toggle {{ $relatorio->aprovacao ? 'btn-success' : 'btn-primary' }}"
                    data-id="{{ $relatorio->id }}"
                    data-approved="{{ $relatorio->aprovacao }}">
              {{ $relatorio->aprovacao ? 'Aprovado' : 'Aprovar' }}
            </button>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.approval-toggle').on('click', function(event) {
            event.preventDefault();
            const button = $(this);
            const id = button.data('id');

            $.post(`/relatorios/${id}/aprovar`, { _token: '{{ csrf_token() }}' })
                .done(function(response) {
                    if (response.aprovacao) {
                        button.text('Aprovado').removeClass('btn-primary').addClass('btn-success');
                    } else {
                        button.text('Aprovar').removeClass('btn-success').addClass('btn-primary');
                    }
                    console.log('Aprovação alternada com sucesso!');
                })
                .fail(function(xhr, status, error) {
                    console.error('Erro ao alternar a aprovação:', error);
                    alert('Erro ao alternar a aprovação!');
                });
        });
    });
</script>
{{ $relatorios->appends(request()->query())->links() }}
@endsection
