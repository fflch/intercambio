@extends('main')
@section('content')

<form method="POST" action="/settings">
    @csrf 
    <br>
        <div class="row">
            <div class="col">
                <textarea name="email" cols="100" rows="3" value="{{ $email }}" ></textarea> 
            </div>
            <div class="form-group col-sm">
                    <button type="submit" onclick="return confirm('Mudar o Email?');" class="btn btn-success p-4">
                    Atualizar o Email
                    </button>
            </div>
        </div>
</form>
    
@endsection