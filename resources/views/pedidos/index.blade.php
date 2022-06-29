@extends('main')

@section('content')

<form method="get">
<div class="row">
    <div class=" col-sm input-group">
    <input type="text" class="form-control" name="search" value="{{ request()->search }}" placeholder="Número USP ou nome do aluno(a)">

    @inject('pedido','App\Models\Pedido')

    <select name="buscastatus" class="form-control">
        <option value="" selected=""> Status </option>
        @foreach($pedido->getStatus() as $key=>$status)

          <option value="{{$key}}" name="buscastatus" 
          @if($key == Request()->buscastatus) selected @endif 
          >{{$status['name']}}</option>

        @endforeach
    </select>

    <span class="input-group-btn">
        <button type="submit" class="btn btn-success">Buscar</button>
    </span>
    </div>
</div>
</form>
<br>
{{ $pedidos->appends(request()->query())->links() }}
<br>
    <div class="card">
        @include('pedidos.partials.index_table')
    </div>
<br>
{{ $pedidos->appends(request()->query())->links() }}
@endsection