@extends('main')

@section('content')

<script>
function flip(clicado) {
    if(clicado == 'Obrigatória'){
        document.getElementById("lista_obrigatorias").style = true;
    } else {
        document.getElementById("lista_obrigatorias").style = "display: none;";
    }
}
</script>
<div class="card">
    <form method="POST" action="/disciplinas/{{$disciplina->id}}" enctype="multipart/form-data">
        @csrf
        @method('patch')

<div class="card-header"><b>Atualizar as informações da Disciplina</b></div>
    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm">
                <div class="form-group">
                    <label class="required"><b>Tipo: </b></label>
                    <br>
                    @foreach(\App\Models\Disciplina::tipos as $tipo)
                        <input type="radio" onclick="flip(this.value)" id="{{ $tipo }}" name="tipo" value="{{$tipo}}" 
                        @if(old('tipo') == '' and $disciplina->tipo == $tipo) 
                        checked
                        @elseif (old('tipo') == $tipo) checked 
                        @endif>
                        <label for="{{ $tipo }}">{{$tipo}}</label>
                    @endforeach
                </div>  
            </div>

            <div class="form-group col-sm-3">
                <div class="form-group">
                    <label for="nome" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome', $disciplina->nome ) }}" placeholder="Nome da matéria">
                </div>  
            </div>

            <div class="form-group col-sm-1">
                <div class="form-group">
                    <label for="nota" class="required"><b>Nota: </b></label>
                    <input type="text" class="form-control" id="nota" name="nota" value="{{ old('nota', $disciplina->nota ) }}" maxlength="5">
                </div>
            </div> 
        
            <div class="form-group col-sm-2">
                <div class="form-group">
                    <label for="creditos" class="required"><b>Créditos obtidos: </b></label>
                    <input type="text" class="form-control" id="creditos" name="creditos" value="{{ old('creditos', $disciplina->creditos ) }}" maxlength="3">
                </div>
            </div>

            <div class="form-group col-sm-2">
                <div class="form-group">
                    <label for="carga_horaria" class="required"><b>Carga Horária Semestral: </b></label>
                    <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="{{ old('carga_horaria', $disciplina->carga_horaria) }}" maxlength="3">
                </div>  
            </div>

        </div>
        <div class="row" id="lista_obrigatorias" @if(old('tipo') == 'Obrigatória') style="display: block;" @else style="display: none;" @endif>
            <div class="form-group col-sm">
                <div class="form-group">
                <label id="textocodigo" for="codigo" class="required"><b>Selecione o código equivalente na USP </b></label>
                <br>
                   <select id="codigo" name="codigo">
                    @foreach($materias as $materia)
                         <option id="codigo" name="codigo" value="{{ $materia['coddis'] }}" 
                            @if(old('codigo') == $materia['coddis']) selected @endif>
                            {{ $materia['coddis'] }} - {{ $materia['nomdis'] }}
                        </option>
                    @endforeach
                    </select> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm">
                <div class="form-group">
                    <label for="file" class="required"><b>Se necessário insira uma nova ementa: </b></label> <br>
                    <input type="file" name="file">
                </div>
            </div>
        </div>

        <div class="row">
        <b>Comentário adicional para a Disciplina (Opcional):</b>
            <textarea class="form-control" rows="3" name="comentario"></textarea>
        </div>

        <div class="row">
            <div class="form-group col-sm-2">
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-success" >Adicionar</button>
                </div>
            </div>  
        </div>
</div>
@endsection

