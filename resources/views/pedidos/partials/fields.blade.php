<div class="card">

<div class="card-header"><h5><b>Requerimento de Aproveitamento de Créditos</b></h5> 
@if($pedido->status == 'Em elaboração')
<a href="/pedidos/{{ $pedido->id }}/edit" class="btn btn-info">Alterar Pedido</a>
@endif
</div>
    <div class="card-body">
    <b>Nome:</b> {{ $pedido->nome ?? '' }}<br>
    <b>Número USP:</b> {{ $pedido->codpes ?? '' }}<br>
    <b>Curso:</b> {{ $pedido->curso ?? '' }}</br>
    <b>Instituição:</b> {{ $pedido->instituicao ?? '' }}<br>
    <b>Boletim:</b> <a href="/pedidos/{{ $pedido->id }}/showfile"><i class="far fa-file-pdf"></i></a> <br>           

    @if($pedido->status == 'Em elaboração' && !$pedido->disciplinas->isEmpty() )

        <form method="POST" action="/analise/{{$pedido->id}}">
        @csrf 
        <br>
            <div class="row">
                <div class="form-group col-sm">
                        <button type="submit" onclick="return confirm('Enviar para análise? Depois de enviado o pedido não pode ser alterado');" class="btn btn-success p-2">
                        Já inseri todas disciplinas e quero enviar o Pedido para Análise!
                        </button>
                </div>
            </div>
        </form>

    @endif

    </div>
    @can('admin')
        @if($pedido->status == 'Análise' && !$pedido->disciplinas->isEmpty() )
            <div class="card-body">
            @include('pedidos.partials.conversao')
                <div class="row">
                <form method="POST" action="/deferimento/{{ $pedido->id }}">
                    @csrf
                    @method('patch')
                    @if($pedido-> status == 'Análise')
                    @include('pedidos.partials.disciplinas_checkbox')
                    
                    Comentário (Obrigatório caso seja indeferido):
                    <textarea  class="form-control" rows="3" name="comentario" placeholder="Este comentário será enviado ao aluno"></textarea>
                    <br>
                    <button type="submit" onclick="return confirm('Certeza que deseja deferir essa(s) disciplina(s)');" class="btn btn-success" name="deferimento" value="Deferido">Deferir</button>
                    <button type="submit" onclick="return confirm('Certeza que deseja indeferir essa(s) disciplina(s)');" class="btn btn-danger" name="deferimento" value="Indeferido">Indeferir</button>
                    @endif
                </form>
                </div> 
            </div> 
        @else 
            @include('pedidos.partials.disciplinas_checkbox')
        @endif
    @else
        @include('pedidos.partials.disciplinas_checkbox')
    @endcan
</div> 


