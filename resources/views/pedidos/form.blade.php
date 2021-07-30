
<div class="card">
<div class="card-header"><h5><b>À Comissão de Graduação da Faculdade de Filosofia Letras e Ciências Humanas da USP.</b></h5></div>
<div class="card-body">
    
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
     <div class="row">
            <div class="form-group col-sm-6">
                <div class="form-group">
                <label id="id_pais" for="id_pais" class="required"><b>Selecione o país da Instituição</b></label>
                <br>
                   <select id="id_pais" name="id_pais" onchange="this.form.submit()">
                    @foreach($countries as $country)
                         <option id="country_selected" name="country_selected" value="{{ $country['id'] }}" 
                            @if(old('nome') == $country['nome']) selected @endif>
                            {{ $country['nome'] }}
                        </option>
                    @endforeach
                    </select> 
                </div>
            </div>
        </div>
    </form>

<form method="POST" action="/pedidos" enctype="multipart/form-data">
        @csrf        
        <div class="row">
            <div class="form-group col-sm-6">
                <div class="form-group">
                <label id="instituicao" for="instituicao" class="required"><b>Selecione a Instituição </b></label>
                <br>
                   <select id="instituicao_id" name="instituicao_id">
                    @foreach($instituicoes as $instituicao)

                         <option id="instituicao_id" name="instituicao_id" value="{{ $instituicao['id'] }}" 
                        @if(old('nome') == $instituicao['nome']) selected @endif>
                            {{ $instituicao['nome_instituicao'] }}
                        </option>

                    @endforeach
                    </select> 
                </div>
            </div>
        </div>

        <div class="row">
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