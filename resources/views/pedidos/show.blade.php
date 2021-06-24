@extends('main')
@section('content')

    {!! $stepper !!}
    @include('pedidos.partials.fields')
          
    @if($pedido->status == 'Em elaboração')
        @include('disciplinas.partials.form')          
    @endif
        
@endsection