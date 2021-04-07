@extends('main')

@section('content')

<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>

<div class="card-body">

    <form method="POST" action="/pedidos">
        @csrf
        <div class="row">
        <div class="form-group">
            <label for="instituicao" class="required"><b>Insira a instituicao de ensino no exterior: </b></label>
            <input type="text" class="form-control" id="instituicao" name="instituicao" value="{{old('instituicao', $pedido->instituicao )}}">
        </div>
        </div> 
        
        <div class="form-group">
            <button type="submit" class="btn btn-success">Enviar</button>
        </div>
    </form>
</div>

@endsection

