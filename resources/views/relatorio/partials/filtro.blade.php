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