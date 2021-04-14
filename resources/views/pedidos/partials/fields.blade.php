<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>

<div class="col-sm form-group col-sm-10">
Eu, <b>{{ $pedido->nome ?? '' }}</b> aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP <b>{{ $pedido->codpes ?? '' }}</b> , 
no Curso de <b>{{ $pedido->curso ?? '' }}</b>, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): <br>
Na instituição: <b>{{ $pedido->instituicao ?? '' }}</b> <br>

Status do pedido: <b>{{ $pedido->status }}</b>                
</div>


@if($pedido -> status == 'Em elaboração')

<a href="/pedidos/{{$pedido->id}}/analise" onclick="return confirm('Enviar para análise? Depois de enviado o pedido não pode ser alterado');" class="btn btn-success"> Enviar para Análise </a>



@endif
<hr>

