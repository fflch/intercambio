@extends('main')

@section('content')

<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<label for="Texto" class="required"><b>Eu, {{ $discente->Nome}} aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP {{ $discente->nUSP}} , no Curso de {{ $discente->Curso}}, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): </b></label>                    
</div>

<hr>
<div class="card-header"><b>Informar os dados</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-7">
                <div class="form-group">
                    <label for="Instituicao" class="required"><b>Instituição de ensino: {{ $discente->Instituicao}}</b></label>
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeDisciplina" class="required"><b>Nome da Disciplina: {{ $discente->NomeDisciplina}}</b></label>           
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Dados da disciplina cursada</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="Nota" class="required"><b>Nota: {{ $discente->Nota}}</b></label>
                </div>
            </div> 
        
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Credito" class="required"><b>Créditos obtidos: {{ $discente->Credito}}</b></label>
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="CargaHoraria" class="required"><b>Carga horaria: {{ $discente->CargaHoraria}}</b></label>
                                  
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Disciplina equivalante na USP</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <label for="Codigo" class="required"><b>Código: {{ $discente->Codigo}}</b></label>
                </div>
            </div> 
            

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeUsp" class="required"><b>Nome:{{ $discente->NomeUsp}} </b></label>
                </div>
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
                    <input type="radio" id="Deferido" name="Selecione" value="Deferido"  @if($discente->Selecione == "Deferido")checked @else {{ old('Selecione') == 'Deferido' ? 'checked' : ''}}@endif>
                    <label for="percentual">Deferido Motivo:</label><br>
                    <input type="radio" id="Inferido" name="Selecione" value="Inferido" @if($discente->Selecione == "Inferido")checked @else {{ old('Selecione') == 'Inferido' ? 'checked' : ''}}@endif>
                    <label for="real">Inferido Motivo:</label><br>
                    <input type="text" class="form-control" id="Motivo" name="Motivo" value="{{old('Motivo', $discente->Motivo )}}">
                </div>
            </div>
            <div class="form-group">
    <button type="submit" class="btn btn-success">Enviar</button>
</div>
    </div>
</div>
</div>



@endsection

