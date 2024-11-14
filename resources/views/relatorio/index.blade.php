@extends('main')

@section('content')
<h2>Relatórios para Aprovação</h2>

<div class="mb-3">
  <label for="search" class="form-label"><strong>Buscar por Nome ou Número USP</strong></label>
  <input type="text" class="form-control" id="search" placeholder="Digite o nome ou número USP">
</div>

{{ $relatorios->appends(request()->query())->links() }}

<table class="table table-striped" id="relatorio-table">
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

{{ $relatorios->appends(request()->query())->links() }}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $(document).ready(function() {

    $('#search').on('input', function() {
      const query = $(this).val();
        if (query.length >= 1 || query.length === 0) {
          $.ajax({
            url: '{{ route("relatorio.search") }}',
            method: 'GET',
            data: { search: query },
            success: function(response) {
              $('#relatorio-table tbody').html(response);
            },
            error: function(xhr, status, error) {
              $('#relatorio-table tbody').html("<tr><td>Erro na busca!</td><tr>");
            }
          });
        }
    });

    $(document).on('click', '.approval-toggle', function(event) {
      event.preventDefault();
      const button = $(this);
      const id = button.data('id');
      const currentApproval = button.data('approved');

      $.post(`/relatorios/${id}/aprovar`, { _token: '{{ csrf_token() }}' })
        .done(function(response) {
          if (response.aprovacao) {
            button.text('Aprovado').removeClass('btn-primary').addClass('btn-success');
          } else {
            button.text('Aprovar').removeClass('btn-success').addClass('btn-primary');
          }
        })
        .fail(function(xhr, status, error) {
          alert('Erro ao alternar a aprovação!');
        });
      });
  });
</script>
@endsection
