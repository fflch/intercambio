@extends('main')

@section('content')


<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<div class="col-sm form-group col-sm-10">
<label for="Texto" class="required" ><b>Eu,{{ $discenteOpt->Nome}} aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP {{ $discenteOpt->nUSP}} , no Curso de {{ $discenteOpt->Curso}}, <br>
venho respeitosamente requerer o reconhecimento das disciplinas cursadas no exterior, através do Programa de Intercâmbio Internacional de Alunos de Graduação, no período de:{{ $discenteOpt->Periodo}} </b></label>                      
</div>

<hr>
<div class="card-header"><b>Informar os dados</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-7">
                <div class="form-group">
                    <label for="Instituicao" class="required"><b>Instituição de ensino: {{ $discenteOpt->Instituicao}}</b></label>
                    </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeDisciplina" class="required"><b>Nome da Disciplina: {{ $discenteOpt->NomeDisciplina}}</b></label>
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Dados da disciplina cursada</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="Semestre" class="required"><b>Semestre Início e Término (dia/mês/ano): {{ $discenteOpt->DataInicial}} {{ $discenteOpt->DataFinal}}</b></label>
                </div>
            </div> 
        
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Credito" class="required"><b>Créditos obtidos: {{ $discenteOpt->Credito}}</b></label>
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="CargaHoraria" class="required"><b>Carga horaria: {{ $discenteOpt->CargaHoraria}} </b></label>
            </div>  
        </div>  
    </div>
</div>


<div class="card-header"><b>MODALIDADE DE OPTATIVA*</b></div>
    <div class="card-body">

    <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Modalidade" class="required"><b>Modalidade: {{ $discenteOpt->Modalidade}}</b></label><br>
                </div>
    </div>
    </div>
</div>


<hr>

<div class="card">

<div class="card-header"><b>PARECER DA COORDENAÇÂO DE CURSO:</b></div>
    <div class="card-body">

    <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Selecione" class="required"><b>Selecione: </b></label><br>
                    <input type="radio" id="Deferido" name="Selecione" value="Deferido"  @if($discenteOpt->Selecione == "Deferido")checked @else {{ old('Selecione') == 'Deferido' ? 'checked' : ''}}@endif>
                    <label for="percentual">Deferido Motivo:</label><br>
                    <input type="radio" id="Inferido" name="Selecione" value="Inferido" @if($discenteOpt->Selecione == "Inferido")checked @else {{ old('Selecione') == 'Inferido' ? 'checked' : ''}}@endif>
                    <label for="real">Inferido Motivo:</label><br>
                    <input type="text" class="form-control" id="Motivo" name="Motivo" value="{{old('Motivo', $discenteOpt->Motivo )}}">
                </div>
            </div>
            <div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
    </div>
</div>
</div>



@endsection

