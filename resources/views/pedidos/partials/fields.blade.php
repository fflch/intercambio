
<div class="card">
<div class="card-header"><h5><b>À COMISSÃO DE GRADUAÇÃO DA FACULDADE DE FILOSOFIA LETRAS E CIÊNCIAS HUMANAS DA USP.</b></h5></div>
<div class="row">
<div ><b></b></div> 
</div>


<div class="form-group">
<div class="col-sm form-group col-sm-10">
<label for="Texto" class="required" ><b>Eu, {{ $pedido->nome ?? '' }} aluno(a) regularmente <br>
matriculado(a) nesta Faculdade, N° USP {{ $pedido->codpes ?? '' }} , no Curso de {{ $pedido->curso ?? '' }}, <br>
venho requerer o aproveitamento de estudos (dispensa de disciplina): <br>
Na instituicao: {{ $pedido->instituicao ?? '' }}</b></label>                    
</div>

<hr>

<div class="card-header"><b>Disciplinas cadastradas por arquivo</b></div>
<br>
@forelse($pedido->files as $file)
<li><a href="/files/{{$file->id}}">{{ $file->original_name ?? '' }}</a></li>

@empty
    Não há nenhum arquivo cadastrado
@endforelse


<br>
<div class="card-header"><b>Disciplinas cadastradas manualmente</b></div>
<br>
@forelse($pedido->disciplinas as $disciplina)
<li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }}</a></li>
@empty
    Não há nenhum cadastrado
@endforelse
<br>


@csrf

@include('files.partials.form')
@include('disciplinas.partials.form')
