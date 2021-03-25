@extends('main')

@section('content')

<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<div class="col-sm form-group col-sm-10">
<label for="Texto" class="required" ><b>Eu, <input type="text" id="Nome" name="Nome" value="{{old('Nome', $discente->Nome )}}"> aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP <input type="text" id="nUSP" name="nUSP" value="{{old('nUSP', $discente->nUSP )}}"> , no Curso de <input type="text" id="Curso" name="Curso" value="{{old('Curso', $discente->Curso )}}">, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): </b></label>                    
</div>


<hr>
<div class="card-header"><b>Informar os dados</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-7">
                <div class="form-group">
                    <label for="Instituicao" class="required"><b>Instituição de ensino: </b></label>
                    <input type="text" class="form-control" id="Instituicao" name="Instituicao" value="{{old('Instituicao', $discente->Instituicao )}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeDisciplina" class="required"><b>Nome da Disciplina: </b></label>
                    <input type="text" class="form-control" id="NomeDisciplina" name="NomeDisciplina" value="{{old('NomeDisciplina', $discente->NomeDisciplina )}}">
              
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Dados da disciplina cursada</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-4">
                <div class="form-group">
                    <label for="Nota" class="required"><b>Nota: </b></label>
                    <input type="text" class="form-control" id="Nota" name="Nota" value="{{old('Nota', $discente->Nota )}}">
                </div>
            </div> 
        
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="Credito" class="required"><b>Créditos obtidos: </b></label>
                    <input type="text" class="form-control" id="Credito" name="Credito" value="{{old('Credito', $discente->Credito )}}">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="CargaHoraria" class="required"><b>Carga horaria: </b></label>
                    <input type="text" class="form-control" id="CargaHoraria" name="CargaHoraria" value="{{old('CargaHoraria', $discente->CargaHoraria )}}">
                
            </div>  
        </div>  
    </div>
</div>

<div class="card-header"><b>Disciplina equivalante na USP</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <label for="Codigo" class="required"><b>Código: </b></label>
                    <input type="text" class="form-control" id="Codigo" name="Codigo" value="{{old('Codigo', $discente->Codigo )}}">
                </div>
            </div> 
            

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="NomeUsp" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="NomeUsp" name="NomeUsp" value="{{old('NomeUsp', $discente->NomeUsp )}}">
               </div>
            </div>
            
      </div>
      <div class="form-group">
     <button type="submit" class="btn btn-success">Enviar</button>
    </div>
    </div>
</div>



@endsection

