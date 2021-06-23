@extends('main')
@section('content')

<form method="POST" action="/settings">
    @csrf 
    <br>
        <div class="row">
            <div class="col">
                <label for="email_analise_aluno" ><b> MENSAGEM PARA ALUNO – Confirmação do envio do pedido de aproveitamento</b></label><br>
                <textarea name="email_analise_aluno" cols="130" rows="15">{{ $email_analise_aluno }}</textarea> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_analise_ccint" ><b>MENSAGEM PARA A CCINT – Aviso de recebimento de pedido de aproveitamento de créditos </b></label><br>
                <textarea name="email_analise_ccint" cols="130" rows="15">{{ $email_analise_ccint }}</textarea> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_indeferido" ><b>MENSAGEM PARA ALUNO – Devolução do pedido de aproveitamento – problemas com a documentação </b></label><br>
                <textarea name="email_indeferido" cols="130" rows="15">{{ $email_indeferido }}</textarea> 
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col">
                <label for="email_deferido" ><b>MENSAGEM PARA ALUNO – Finalização do pedido de aproveitamento de créditos</b></label><br>
                <textarea name="email_deferido" cols="130" rows="15">{{ $email_deferido }}</textarea> 
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