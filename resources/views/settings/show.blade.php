@extends('main')
@section('content')

<div class="card">
    <div class="card-header"><h4>Configurações de sistema</h4></div>
        <div class="card-body">
            <div>
                <b>Instruções de estilo:</b><br>
                <b>{{ "<br>" }}</b>: quebra de linha<br>
                <b>{{"<b>"}}</b> e <b>{{"</b>"}}</b>: determina qual parte do texto ficará em negrito<br>
                <b>{{"<center>"}}</b> e <b>{{"</center>"}}</b>: determina qual parte do texto ficará centralizada<br>
                <b>{{"<hr>"}}</b>: cria linha horizontal<br>
                <b>{{"<i>"}}</b> e <b>{{"</i>"}}</b>: determina qual parte do texto ficará em itálico<br>
                <b>{{"<u>"}}</b> e <b>{{"</u>"}}</b>: determina qual parte do texto ficará sublinhado<br>
                <b>{{"<p>"}}</b> e <b>{{"</p>"}}</b>: cria uma parágrafo<br>
            </div><br>
        </div>
    </div>

<form method="POST" action="/settings">
    @csrf 
    <br>
        <div class="row">
            <div class="col">
                <label for="email_analise_aluno" ><b> MENSAGEM PARA ALUNO – Confirmação do envio do pedido de aproveitamento</b></label><br>
                <textarea name="email_analise_aluno" cols="130" rows="15">{{ $email_analise_aluno }}</textarea><br>
                <span class="badge badge-warning">Token de substituição: %nome_aluno </span> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_analise_ccint" ><b>MENSAGEM PARA A CCINT – Aviso de recebimento de pedido de aproveitamento de créditos </b></label><br>
                <textarea name="email_analise_ccint" cols="130" rows="15">{{ $email_analise_ccint }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno </span> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b>MENSAGEM PARA ALUNO – Devolução do pedido de aproveitamento – problemas com a documentação </b></label><br>
                <textarea name="email_indeferido" cols="130" rows="15">{{ $email_indeferido }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno, %disciplina </span> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b>MENSAGEM PARA ALUNO – Retorno do pedido de aproveitamento para em elaboração </b></label><br>
                <textarea name="email_em_elaboracao_aluno" cols="130" rows="15">{{ $email_em_elaboracao_aluno }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno</span> 
            </div>
        </div>
        <br>
    
        <div class="row">
            <div class="col">
                <label for="email_deferido" ><b>MENSAGEM PARA ALUNO – Email de deferimento para o aluno</b></label><br>
                <textarea name="email_deferido" cols="130" rows="15">{{ $email_deferido }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno, %disciplina </span> 
            </div>
        </div>
        <br>
    
        <div class="row">
            <div class="col">
                <label for="email_docente" ><b>E-mail docente</b></label><br>
                <textarea name="email_docente" cols="130" rows="15">{{ $email_docente }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %docente, %disciplina, %nome_aluno, %universidade  </span> 
            </div>
        </div>
        <br>
        
        <div class="row">
            <div class="col">
                <label for="email_cg" ><b>E-mail Comissão de Graduação</b></label><br>
                <textarea name="email_cg" cols="130" rows="15">{{ $email_cg }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno </span> 
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col">
                <label for="email_sg" ><b>E-mail Serviço de Graduação</b></label><br>
                <textarea name="email_sg" cols="130" rows="15">{{ $email_sg }}</textarea><br> 
                <span class="badge badge-warning">Token de substituição: %nome_aluno </span> 
            </div>
        </div>
        <br>

        <div class="row">
            <div class="form-group col-sm">
                    <button type="submit" onclick="return confirm('Mudar o Email?');" class="btn btn-success">
                    Salvar
                    </button>
            </div>
        </div>
</form>
    
@endsection
