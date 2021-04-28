<form method="POST" action="/disciplinas/">
@csrf
<div class="card-header"><b>Adicione abaixo as disciplinas que deseja pedir aproveitamento de crédito</b></div>

    <div class="card-body">
        <div class="row">

            <div class="col-sm form-group">
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

<div class="card-header"><b>Disciplina equivalante na USP</b></div>
    <div class="card-body">

        <div class="row">
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <label for="codigo" class="required"><b>Código: </b></label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="">
                    <small> Exemplo: FLM1988 </small>
                </div>
            </div> 
            

            <div class="col-sm form-group">
                <div class="form-group">
                    <label for="nome_usp" class="required"><b>Nome: </b></label>
                    <input type="text" class="form-control" id="nome_usp" name="nome_usp" value="">
               </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm form-group col-sm-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Adicionar Disciplina</button>
                    <input class="form-control" type="hidden" name="pedido_id" value="{{ $pedido->id }}" >
                </div>
            </div>
</form>
        </div>
    </div>




