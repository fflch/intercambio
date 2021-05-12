<form method="POST" action="/disciplinas/">
@csrf

<script>

function Habilitar() {
    document.getElementById("codigo").disabled = false;
}

function Desabilitar() {
    document.getElementById("codigo").disabled = true;
}
</script>

<div class="card-header"><b>Adicione as informações da disciplina</b></div>

    <div class="card-body">
        <div class="row">

            <div class="col-sm form-group sm-1">
                <div class="form-group">
                    <label for="tipo" class="required"><b>Tipo da disciplina: </b></label>
                    <br>
                    <input type="radio" onclick="Habilitar()" id="Obrigatória" name="tipo" value="Obrigatória">
                    <label for="Obrigatória">Obrigatória</label><br>
                    <input type="radio" onclick="Desabilitar()" id="Optativa Livre" name="tipo" value="Optativa Livre">
                    <label for="Optativa Livre ">Optativa Livre </label><br>
                    <input type="radio" onclick="Desabilitar()" id="Optativa Eletiva" name="tipo" value="Optativa Eletiva">
                    <label for="Optativa Eletiva">Optativa Eletiva</label> 
                </div>  
            </div>

            <div class="col-sm form-group sm-5">
                <div class="form-group">
                    <label for="nome" class="required"><b>Nome da Disciplina: </b></label>
                    <input type="text" class="form-control" id="nome" name="nome" value="">
                </div>  
            </div>

            <div class="col-sm form-group col-sm-1">
                <div class="form-group">
                    <label for="nota" class="required"><b>Nota: </b></label>
                    <input type="text" class="form-control" id="nota" name="nota" value="">
                </div>
            </div> 
        
            <div class="col-sm form-group col-sm-2">
                <div class="form-group">
                    <label for="creditos" class="required"><b>Créditos obtidos: </b></label>
                    <input type="text" class="form-control" id="creditos" name="creditos" value="">
                </div>
            </div>

            <div class="col-sm form-group col-sm-2">
                <div class="form-group">
                    <label for="carga_horaria" class="required"><b>Carga horaria: </b></label>
                    <input type="text" class="form-control" id="carga_horaria" name="carga_horaria" value="">
                
            </div>  

        </div>  
    </div>
</div>

<div class="card-header" ><b>Disciplina equivalante na USP</b></div>
    <div class="card-body" >

        <div class="row" >
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <label for="codigo" class="required"><b>Código: </b></label>
                    <br>

                    <select id="codigo" class="form-select" aria-label="Default select example" disabled>

                        @foreach($disciplinas as $disciplina)
                         <option value="{{$disciplina}}">{{$disciplina}}</option>
                        @endforeach
                    </select>
                    <br>

                    <small> Exemplo: FLM1988 </small>
                </div>
            </div> 
            

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nome_usp" class="required"><b>Nome: </b></label>
               </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Adicionar Disciplina</button>
                    <input class="form-control" type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                </div>
            </div>
</form>
        </div>
    </div>




