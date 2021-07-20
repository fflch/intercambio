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
                            <label for="instituicao" class="required"><b>Altere a Instituicao de Ensino no exterior:</b></label>
                            <input type="text" class="form-control" id="instituicao" name="instituicao" value="{{old('instituicao', $pedido->instituicao )}}">
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