@extends('main')
@section('content')
    @include('pedidos.partials.fields')

    @include('disciplinas.index')
    @if($pedido->status == 'Em elaboração')
        @include('disciplinas.partials.form')
    @endif
    
@endsection  