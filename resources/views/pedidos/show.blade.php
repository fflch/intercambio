@extends('main')
@section('content')

    @include('pedidos.partials.fields')
          
    @if($pedido->status == 'Em elaboração')
        @include('disciplinas.partials.form')
        @include('pedidos.partials.disciplinas_checkbox')   
    @endif

    @if($pedido->status == 'Finalizado')
        @include('pedidos.partials.disciplinas_checkbox')   
    @endif
    
@endsection