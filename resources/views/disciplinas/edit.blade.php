@extends('main')

@section('content')

<h2>Solicitação de Revisão de Indeferimento</h2><br>

<b>Disciplina:</b> {{ $disciplina->nome }} <br>
<b>Tipo:</b> {{ $disciplina->tipo }}<br>
<b>Nota:</b> {{ $disciplina->nota }}<br>
<b>Créditos:</b> {{ $disciplina->creditos }}<br>
<b>Carga Horária:</b> {{ $disciplina->carga_horaria }}<br>
<b>Código equivalente USP (quando houver):</b> {{ $disciplina->codigo }}<br>
<br>
 <form method="POST" action="/disciplinas/{{$disciplina->id}}" enctype="multipart/form-data">
    @csrf
    @method('patch')

    <div class="row">
        <div class="form-group col-sm">
          <label for="file"><b>Motivo:</b></label> <br>
          <textarea class="form-control" rows="3" name="comentario"></textarea>
      </div>
    </div>

    <div class="form-group col-sm">
        <div class="form-group">
            <label for="file"><b>Substituir arquivo com a ementa (Opcional): </b></label> <br>
            <input type="file" name="file">
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-2">
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-success" >Enviar</button>
            </div>
        </div>  
    </div>
   
  </form> 
@endsection