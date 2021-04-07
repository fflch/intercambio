<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>

<div class="col-sm form-group col-sm-10">
Eu, {{ $pedido->nome ?? '' }} aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP {{ $pedido->codpes ?? '' }} , 
no Curso de <b>{{ $pedido->curso ?? '' }}</b>, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): <br>
Na instituição: <b>{{ $pedido->instituicao ?? '' }}</b> <br>

Status do pedido: <b>{{ $pedido->status }}</b>                
</div>



<a href="/pedidos/{{$pedido->id}}/analise" class="btn btn-success"> Enviar para Análise </a>

<hr>

