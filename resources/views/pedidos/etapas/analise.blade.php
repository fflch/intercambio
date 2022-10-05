<div class="card-body">
                
    <div class="row">
        <div class="col-sm">
            @if(sizeof($pedido->disciplinas) > 0)
                @include('pedidos.partials.conversao')
                @include('pedidos.partials.disciplinas_checkbox')
                @include('pedidos.partials.soma_conversao')
            @endif

            <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
                @csrf
                <input type="hidden" name="status" value="Em elaboração">
                <br>
                Comentário (Obrigatório caso seja devolvido ao Aluno):
                <textarea  class="form-control" rows="3" name="comentario" placeholder="Este comentário será enviado ao aluno"></textarea>
                <br>    
                <div class="row">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para em elaboração? ');" class="btn btn-warning p-2">
                        Retornar o pedido para em elaboração
                        </button>
                    </div>
                </div>
            </form>

            <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
                @csrf
                <input type="hidden" name="status" value="Comissão de Graduação">
                <br>
            
                <div class="row">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja enviar para comissão de graduação? ');" class="btn btn-success p-2">
                            Enviar para Comissão de Graduação
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>