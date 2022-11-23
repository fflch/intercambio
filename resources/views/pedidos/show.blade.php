@extends('main')
@section('content')

    {!! $stepper !!}
    @include('pedidos.partials.fields')
          
    @if($pedido->status == 'Em elaboração')
        @include('pedidos.partials.disciplinas_checkbox')
        @include('disciplinas.partials.form')          
    @endif
        
@endsection