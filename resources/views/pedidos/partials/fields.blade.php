<div class="card">
    <div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
        <div class="card-body">
        Eu, <b>{{ $pedido->nome ?? '' }}</b> aluno(a) regularmente 
        matriculado(a) nesta Faculdade, N° USP <b>{{ $pedido->codpes ?? '' }}</b>, 
        no Curso de <b>{{ $pedido->curso ?? '' }}</b>,
        venho requerer o aproveitamento de estudos (dispensa de disciplina):
        Na instituição: <b>{{ $pedido->instituicao ?? '' }}</b>
        <br>
        <br>
@if($pedido-> status == 'Análise')

        Comentario do pedido: {{ $pedido->reason }}
        <br>
        <br>
@endif  
        Status do pedido: <b>{{ $pedido->status }}</b>                    

@if($pedido-> status == 'Em elaboração' && !$pedido->disciplinas->isEmpty() )

    <form method="POST" action="/analise/{{$pedido->id}}">
    @csrf 
    <br>
        <div class="row">
            <div class="col">
                <textarea name="reason" cols="100" rows="3" value="{{ old('reason') }}" placeholder="Se necessario adcione um comentário ao seu pedido"></textarea> 
            </div>
            <div class="form-group col-sm">
                    <button type="submit" onclick="return confirm('Enviar para análise? Depois de enviado o pedido não pode ser alterado');" class="btn btn-success p-4">
                    Enviar para Análise 
                    </button>
            </div>
        </div>
</form>

@endif

    </div>

@if($pedido-> status == 'Análise')

<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-5">
        <a href="/pedidos/{{$pedido->id}}/retornar_analise" onclick="return confirm('Retornar para o aluno?');" class="btn btn-success"> Retornar para Elaboração </a>
        </div>  
    
        <div class="form-group col-sm-5">
        <a href="/pedidos/{{$pedido->id}}/finalizado" onclick="return confirm('Finalizar o pedido? ao confirmar não poderão ser feitas mais mudanças');" class="btn btn-success"> Finalizar Pedido Completamente </a>        
        </div>
    </div> 
</div> 


@endif


<hr>

