@extends('main')
@section('content')
    @include('pedidos.partials.fields')

            @include('disciplinas.index')
        
            @include('files.index')        
       

    @if($pedido->status == 'Em elaboração')
        @include('disciplinas.partials.form')
        @include('files.partials.form')
        
    @endif
    
@endsection  