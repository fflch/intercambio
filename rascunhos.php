
<form method="POST" action="/deferimento/{{ $pedido->id }}">
@csrf
@method('patch')


        
        Comentário (Obrigatório caso seja devolvido ao Aluno):
        <textarea  class="form-control" rows="3" name="comentario" placeholder="Este comentário será enviado ao aluno"></textarea>
        <div class="form-group">
        <br>
            <button type="submit" onclick="return confirm('Tem certeza que deseja deferir a(s) disciplina(s)');" class="btn btn-success" name="deferimento" value="Comissão de Graduação">Enviar para Comissão de Graduação</button>
        </div>

</form>


@include('pedidos.partials.disciplinas_checkbox')


@can('admin')
@if($pedido->status == 'Comissão de Graduação' && !$pedido->disciplinas->isEmpty() )
<div class="btn-group" role="group">
<div class="card-body">
    <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
        @csrf 
        <input type="hidden" name="status" value="Análise">
        <br>
        <div class="row">
            <div class="form-group">
                <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para análise? ');" class="btn btn-warning p-2">
                Retornar o pedido para análise
                </button>
            </div>
        </div>
    </form>
    @endcan
    @endif


@if( $disciplina->status == "Análise" )
    <input type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}">
@else
    <i>{{ $disciplina->status }}</i>
@endif
@else
    <i>{{ $disciplina->status }}</i>
    @if($disciplina->status == 'Indeferido')
    [<a href="/disciplinas/{{ $disciplina->id }}/edit">Solicitar Revisão</a>]
    @endif


@else
    @if(sizeof($pedido->disciplinas) > 0)
        @include('pedidos.partials.disciplinas_checkbox')
        @include('pedidos.partials.soma_conversao')
    @endif
@endif

