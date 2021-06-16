@extends('main')
@section('content')

<form method="POST" action="/settings">
    @csrf 
    <br>
        <div class="row">
            <div class="col">
                <textarea name="email_analise_disciplina" cols="100" rows="3">{{ $email_analise_disciplina }}</textarea> 
            </div>
        </div>

        <br>
        <div class="row">

            <div class="form-group col-sm">
                    <button type="submit" onclick="return confirm('Mudar o Email?');" class="btn btn-success">
                    Salvar
                    </button>
            </div>
        </div>
</form>
    
@endsection