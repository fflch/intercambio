<div class="card">
<div class="card-header"><h5><b>Requerimento de Aproveitamento de Créditos</b></h5>
@if($pedido->status == 'Em elaboração')
    <a href="/pedidos/{{ $pedido->id }}/edit" class="btn btn-info">Alterar Pedido</a>
@elseif($pedido->status == 'Finalizado')
    @foreach($pedido->disciplinas->sortBy('tipo') as $disciplina)
        @if($disciplina->status == 'Indeferido')
        <a href="/pedidos/{{ $pedido->id }}/edit" class="btn btn-info">Alterar Pedido</a>
        @break
        @endif
    @endforeach
@endif
</div>
    <div class="card-body">
    <b>Nome:</b> {{ $pedido->nome ?? '' }}<br>
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
    @can('admin')
        @if($pedido->status == 'Análise' && !$pedido->disciplinas->isEmpty() )
        <div class="btn-group" role="group">
        <div class="card-body">
            <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
                @csrf
                <input type="hidden" name="status" value="Em elaboração">
                <br>
                <div class="row">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para em elaboração? ');" class="btn btn-warning p-2">
                        Retornar o pedido para em elaboração
                        </button>
                    </div>
                </div>
            </form>
            <form method="POST" action="/send_to_comissao_graduacao/{{$pedido->id}}">
                @csrf
                <input type="hidden" name="status" value="Comissão de Graduação">
                <br>
                <div class="row">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja enviar o pedido para comissão de graduação? ');" class="btn btn-info">
                        Enviar o pedido para comissão de graduação
                        </button>
                    </div>
                </div>
            </form>
        </div>
        </div>

            <div class="card-body">
            @include('pedidos.partials.conversao')
                <div class="row">
                    <form method="POST" action="/deferimento/{{ $pedido->id }}">
                    @csrf
                    @method('patch')
                        @if($pedido-> status == 'Análise')
                        @if(sizeof($pedido->disciplinas) > 0)
                            @include('pedidos.partials.disciplinas_checkbox')
                            @include('pedidos.partials.soma_conversao')
                        @endif
                        Comentário (Obrigatório caso seja indeferido):
                        <textarea  class="form-control" rows="3" name="comentario" placeholder="Este comentário será enviado ao aluno"></textarea>
                        <div class="form-group">
                        <br>
                            <button type="submit" onclick="return confirm('Tem certeza que deseja deferir a(s) disciplina(s)');" class="btn btn-success" name="deferimento" value="Deferido">Deferir</button>
                            <button type="submit" onclick="return confirm('Tem certeza que deseja indeferir a(s) disciplina(s)');" class="btn btn-danger" name="deferimento" value="Indeferido">Indeferir</button>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        @else
            @if(sizeof($pedido->disciplinas) > 0)
                @include('pedidos.partials.disciplinas_checkbox')
                @include('pedidos.partials.soma_conversao')
            @endif
        @endif
    @else
        @if(sizeof($pedido->disciplinas) > 0)
            @include('pedidos.partials.disciplinas_checkbox')
        @endif
    @endcan
