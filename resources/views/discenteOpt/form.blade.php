@extends('main')

@section('content')

<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<div class="col-sm form-group col-sm-10">
<label for="Texto" class="required" ><b>Eu, <input type="text" name="nome" value="{{old('Nome', $discenteOpt->Nome )}}"> aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP <input type="text" name="nUSP" value="{{old('nUSP', $discenteOpt->nUSP )}}"> , no Curso de <input type="text" name="Curso" value="{{old('Curso', $discenteOpt->Curso )}}">, <br>
venho respeitosamente requerer o reconhecimento das disciplinas cursadas no exterior, através do Programa de Intercâmbio Internacional de Alunos de Graduação, no período de:<input type="text" name="Periodo" value="{{old('Periodo', $discenteOpt->Periodo )}}"> </b></label>                      
</div>

<hr>
<div class="card-header"><b>Informar os dados</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-7">
                <div class="form-group">
                    <label for="Instituicao" class="required"><b>Instituição de ensino: </b></label>
                    <input type="text" class="form-control" id="Instituicao" name="Instituicao" value="{{old('Instituicao', $discenteOpt->Instituicao)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeDisciplina" class="required"><b>Nome da Disciplina: </b></label>
                    <input type="text" class="form-control" id="NomeDisciplina" name="NomeDisciplina" value="{{old('NomeDisciplina', $discenteOpt->NomeDisciplina)}}">
              
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Dados da disciplina cursada</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="Semestre" class="required"><b>Semestre Início e Término (dia/mês/ano): </b></label>
                    <input id="DataInicial" type="date" class="form-control" name="DataInicial" value="{{old('DataInicial', $discenteOpt->DataInicial)}}">
                    <input id="DataFinal" type="date" class="form-control" name="DataFinal" value="{{old('DataFinal', $discenteOpt->DataFinal)}}">
                </div>
            </div> 
        
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Credito" class="required"><b>Créditos obtidos: </b></label>
                    <input type="text" class="form-control" id="Credito" name="Credito" value="{{old('Credito', $discenteOpt->Credito)}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="CargaHoraria" class="required"><b>Carga horaria: </b></label>
                    <input type="text" class="form-control" id="CargaHoraria" name="CargaHoraria" value="{{old('CargaHoraria', $discenteOpt->CargaHoraria)}}">
                
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>MODALIDADE DE OPTATIVA*</b></div>
    <div class="card-body">

    <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Modalidade" class="required"><b>Modalidade: </b></label><br>
                    <input type="radio" id="Eletiva" name="Modalidade" value="Eletiva"  @if($discenteOpt->Modalidade == "Eletiva")checked @else {{ old('Modalidade') == 'Eletiva' ? 'checked' : ''}}@endif>
                    <label for="percentual">Eletiva</label><br>
                    <input type="radio" id="Livre" name="Modalidade" value="Livre"  @if($discenteOpt->Modalidade == "Livre")checked @else {{ old('Modalidade') == 'Livre' ? 'checked' : ''}}@endif>
                    <label for="real">Livre</label><br>
                </div>
            </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </div>
</div>
</div>


@endsection

