@extends('main')

@section('content')

<form method="POST" action="/pedidos/{{$pedido->id}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-sm-6">
                    <div class="form-group">
                    <label id="instituicao" for="instituicao" class="required"><b>Selecione a Instituição </b></label>
                    <br>
                    <select id="instituicao_id" name="instituicao_id">
                        @foreach($instituicoes as $insti)
                            <option value="{{ $insti['id'] }}" 
                                @if(old('nome_instituicao') == $insti['nome_instituicao']) selected @endif>
                                {{ $insti['nome_instituicao'] }}
                            </option>
                        @endforeach
                        </select>  
                    </div>
                </div>
                    <div class="form-group col-sm-4">
                        <div class="form-group">
                            <label for="file" class="required"><b>Altere o boletim das matérias cursadas:</b></label> <br>
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
</form> 
@endsection