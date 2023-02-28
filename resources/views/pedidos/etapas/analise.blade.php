<div class="card-body">
                
    <div class="row">
        <div class="col-sm">
            @if(sizeof($pedido->disciplinas) > 0)
                @can('admin') @include('pedidos.partials.conversao') @endcan
                @include('pedidos.partials.disciplinas_checkbox')
                @include('pedidos.partials.soma_conversao')
            @endif

            @can('admin')
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

                <br><br>

                <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
                    @csrf
                    <input type="hidden" name="status" value="Em elaboração">               

                    <div class="form-group">
                        <label for="comentario_disciplina"> <b>Comentário</b> (Obrigatório caso seja devolvido ao Aluno): </label>
                        <select class="form-control" id="comentario_disciplina" name="comentario_disciplina">
                        <option value="" selected=""> Selecione a disciplina a qual o comentário se refere</option>
                        @foreach($pedido->disciplinas as $disciplina)
                            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                        @endforeach
                        </select>
                    </div>

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

        @endcan
        </div>
    </div>
</div>