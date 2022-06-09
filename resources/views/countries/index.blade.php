@extends('main')

@section('content')

<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-sm">
      @include('countries.partials.form')
    </div>
    <div class="col-sm">
      <form method="get">
        <input type="text" style="width: 400px" name="search" value="{{ request()->search }}" placeholder="Procurar País">
        <button type="submit" class="btn btn-success">Buscar</button>
      </form>
    </div>
  </div>
  <br>
  {{ $countries->appends(request()->query())->links() }}
</div>
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
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir o País?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>
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
