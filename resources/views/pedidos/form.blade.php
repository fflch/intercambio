
<div class="card">
<div class="card-header"><h5><b>À Comissão de Graduação da Faculdade de Filosofia Letras e Ciências Humanas da USP.</b></h5></div>
<div class="card-body">
    
    <form method="POST" action="/pedidos" enctype="multipart/form-data">
        @csrf

     <div class="row">
            <div class="form-group col-sm-6">
                <div class="form-group">
                <label id="country" for="country" class="required"><b>Selecione o código equivalente na USP </b></label>
                <br>
                   <select id="country" name="country">
                    @foreach($countries as $country)
                         <option id="country" name="country" value="{{ $country['id'] }}" 
                            @if(old('nome') == $country['nome']) selected @endif>
                            {{ $country['nome'] }}
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