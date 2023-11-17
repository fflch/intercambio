
<div class="card">
    <div class="card-header"><h5><b>Requerimento de Aproveitamento de Créditos</b></h5>
        @if($pedido->status == 'Em elaboração')
            <a href="/pedidos/{{ $pedido->id }}/edit" class="btn btn-info">Alterar Pedido</a>
        @endif
    </div>

    <div class="card-body">
        <b>Nome:</b> {{ $pedido->nome ?? '' }}<br>
        <b>Tipo do Intercâmbio:</b> {{ $pedido->tipo ?? '' }}</br>
        <b>Número USP:</b> {{ $pedido->codpes ?? '' }}<br>
        <b>Curso:</b> {{ $pedido->curso ?? '' }}</br>
        <b>Instituição:</b> {{ $pedido->instituicao->nome_instituicao ?? '' }}<br>
        <b>Boletim:</b> <a href="/pedidos/{{ $pedido->id }}/showfile"><i class="far fa-file-pdf"></i></a> <br>

        @if($pedido->status == 'Em elaboração' && !$pedido->disciplinas->isEmpty() )
            <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
            @csrf
            <input type="hidden" name="status" value="Análise">
            <br>
                <div class="row">
                    <div class="form-group col-sm">
                            <button type="submit" onclick="return confirm('Tem certeza que deseja enviar para Análise? Depois de enviado, o pedido não pode ser alterado.');" class="btn btn-success p-2">
                            Já inseri todas as Disciplinas e quero enviar o Pedido para Análise!
                            </button>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
