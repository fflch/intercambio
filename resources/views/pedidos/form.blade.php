<div class="card">
<div class="card-header"><h5><b>À Comissão de Graduação da Faculdade de Filosofia Letras e Ciências Humanas da USP.</b></h5></div>
<div class="card-body">
    <form method="POST" action="/pedidos" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="form-group col-sm-6">
                <div class="form-group">
                    <label for="instituicao" class="required"><b>Insira a Instituicao de Ensino no exterior:</b></label>
                    <input type="text" class="form-control" id="instituicao" name="instituicao" value="{{old('instituicao', $pedido->instituicao )}}">
                </div> 
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="file" class="required"><b>Adicione o boletim das matérias cursadas:</b></label> <br>
                    <input type="file" name="file">   
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
    </form>
</div>
</div>