@extends('main')

@section('content')

<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<div class="col-sm form-group col-sm-10">
<label for="Texto" class="required" ><b>Eu, {{ $pedido->user->nome ?? '' }} aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP {{ $pedido->user->codpes ?? '' }} , no Curso de {{ $pedido->user->curso ?? '' }}, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): <br>                  
</div>


    <div class="card-body">

        <div class="row">
                <div class="form-group">
                    <label for="instituicao" class="required"><b>Insira a instituicao de ensino no exterior: </b></label>
                    <input type="text" class="form-control" id="instituicao" name="instituicao" value="{{old('instituicao', $pedido->instituicao )}}">
                </div>
            </div> 
            
      </div>
      <div class="form-group">
     <button type="submit" class="btn btn-success">Enviar</button>
    </div>
    </div>
</div>



@endsection

