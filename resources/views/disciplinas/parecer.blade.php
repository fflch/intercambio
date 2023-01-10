@extends('main')

@section('content')

    <div class="row">
        <div class="col-sm">
            <p><b>Número USP discente:</b> {{ $disciplina->pedido->user->codpes }}</p>
            <p><b>Nome discente:</b> {{ $disciplina->pedido->nome }}</p>
            <p><b>Curso:</b> {{ $disciplina->pedido->curso }}</p>
            <p><b>Instituição:</b> {{ $disciplina->pedido->instituicao->nome_instituicao }}</p>
            <p><b>Disciplina:</b> {{ $disciplina->codigo }} - {{ $disciplina->nome }}</p>
            <p><b>Nota:</b> {{ $disciplina->nota }}</p>
            <p><b>Carga horária semestral:</b> {{ $disciplina->carga_horaria }}</p>
            <p><b>Créditos Obtidos:</b> {{ $disciplina->creditos }}</p>
            <p><b>Boletim:</b> <a href="/pedidos/{{ $disciplina->pedido->id }}/showfile"><i class="far fa-file-pdf"></i></a> </p>
            <p><b>Ementa:</b> <a href="/disciplinas/{{ $disciplina->id }}/showfile"><i class="far fa-file-pdf"></i></a></p>
        </div>

        <div class="col-sm">
            <b> Comentário do parecer: </b><br>

            <form method="POST" enctype="multipart/form-data" action="/store_parecer/{{ $disciplina->id }}">
                @csrf
                <textarea  class="form-control" rows="3" name="comentario">{{ old('comentario') }}</textarea>
                <br>
                <p><b>Se desejar, indique outro(a) docente para realização do parecer:</b></p>
                
                <select class="form-control" name="codpes">
                  <option value="" selected="">- Selecione -</option>
                  @foreach ($docentes as $docente)
                    <option value="{{ $docente['codpes'] }}" @if(old('codpes') == $docente['codpes']) ) selected @endif>
                      {{ $docente['nompes'] }}
                    </option>
                  @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-success" name="parecer" value="deferir" onclick="return confirm('Tem certeza que deseja deferir?');"> Deferir</button>
                <button type="submit" class="btn btn-success" name="parecer" value="indicar" onclick="return confirm('Tem certeza que deseja indicar outro(a) docente?');">Apenas encaminhar para outro docente</button>
                <button type="submit" class="btn btn-danger" name="parecer" value="indeferir" onclick="return confirm('Tem certeza que deseja indeferir?');"> Indeferir</button>
            </form>
        </div>
    </div>

   



@endsection
