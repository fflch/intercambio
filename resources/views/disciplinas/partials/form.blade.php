<form method="POST" enctype="multipart/form-data" action="/disciplinas/">
@csrf

<script>

function Habilitar() {
    document.getElementById("codigo").style = true;
    document.getElementById("textocodigo").style = true;
}

function Desabilitar() {
    document.getElementById("codigo").style = "display: none;";
    document.getElementById("textocodigo").style = "display: none;";
}
</script>

<div class="card-header"><b>Adicione as informações da disciplina</b></div>

    <div class="card-body">
        <div class="row">

            <div class="col-sm form-group sm-4">
                <div class="form-group">
                    <label for="tipo" class="required"><b>Tipo: </b></label>
                    <br>
                    <input type="radio" onclick="Habilitar()" id="Obrigatória" name="tipo" value="Obrigatória">
                    <label for="Obrigatória">Obrigatória</label><br>
                    <input type="radio" onclick="Desabilitar()" id="Optativa Livre" name="tipo" value="Optativa Livre">
                    <label for="Optativa Livre ">Optativa Livre </label><br>
                    <input type="radio" onclick="Desabilitar()" id="Optativa Eletiva" name="tipo" value="Optativa Eletiva">
                    <label for="Optativa Eletiva">Optativa Eletiva</label> 
                </div>  
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nome" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="">
                </div>  
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nota" class="required"><b>Nota: </b></label>
                    <input type="text" class="form-control" id="nota" name="nota" value="">
                </div>
            </div> 
        
            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="creditos" class="required"><b>Créditos obtidos: </b></label>
                    <input type="text" class="form-control" id="creditos" name="creditos" value="">
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="carga_horaria" class="required"><b>Carga horaria: </b></label>
                    <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="">
                </div>  
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                <label for="carga_horaria" class="required"><b>Finalizar: </b></label> <br>
                    <button type="submit" class="btn btn-success" >Adicionar</button>
                    <input class="form-control" type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                </div>
             </div>   
        </div>

        <div class="row">

             <div class="col-sm form-group">
                <div class="form-group">
                <label id="textocodigo" for="codigo" class="required" style="display: none;"><b>Selecione o código equivalente </b></label>
                   <select id="codigo" name="codigo" style="display: none;">
                    @foreach($disciplinas as $disciplina)
                         <option id="codigo" name="codigo" value="{{ $disciplina['coddis'] }}">{{ $disciplina['coddis'] }} - {{ $disciplina['nomdis'] }}</option>
                    @endforeach
                    </select> 
                </div>
            </div>

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="file" class="required"><b>Adcione a ementa: </b></label> <br>
                    <input type="file" name="file">
                </div>
            </div>
        </div>
    </div>

</form>




