@extends('main')

@section('content')

{{-- $countries->appends(request()->query())->links() --}}

<form method="get">
<div class="row" >
  <div class=" col-sm input-group">
      <input type="text" style="Weight: 50px;" name="search" value="{{ request()->search }}" placeholder="[Procurar Países]">
      <span class="input-group-btn">
          <button type="submit" class="btn btn-success">Buscar</button>
      </span>
    </div>
</div>
</form>

@include('countries.partials.form')

<div class="container" >
  <div class="row">  
    <div class="col-12" >
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"><h3>Nome</h3></th>
            <th scope="col" style="width:15px"><h3>Alterações</h3></th>
          </tr>
        </thead>
        
        <tbody>
        @foreach($countries as $country)  
          <tr>
            <td><a href="/country/{{$country->id}}">{{$country->nome}}</a></td>
            <td align="center">
              <a href="/country/{{$country->id}}/edit"><i class="fas fa-pencil-alt" color="#007bff"></i></a>
              <form method="POST" action="/country/{{$country->id}}"> 
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir a Disciplina?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
              </form>   
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection