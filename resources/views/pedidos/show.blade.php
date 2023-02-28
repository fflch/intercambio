@extends('main')
@section('content')

    {!! $stepper !!}

    @include('pedidos.partials.fields')

    @if($pedido->status == 'Análise' && !$pedido->disciplinas->isEmpty() )
        @include('pedidos.etapas.analise')
    @endif

    @if($pedido->status == 'Comissão de Graduação')
        @include('pedidos.etapas.comissaograduacao')
    @endif

    @if($pedido->status == 'Serviço de Graduação')
        @include('pedidos.etapas.servicograduacao')
    @endif

    @if($pedido->status == 'Finalizado')
        @include('pedidos.etapas.finalizado')
    @endif

    @if($pedido->status == 'Em elaboração')
        @include('pedidos.partials.disciplinas_checkbox')
        @include('disciplinas.partials.form')          
    @endif
        
@endsection('content')