@extends('main')
@section('content')
    @include('pedidos.partials.fields')

<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-5">
            @include('disciplinas.index')
        </div>  
    
        <div class="form-group col-sm-5">
            @include('files.index')        
        </div>
    </div> 
</div> 

    @if($pedido->status == 'Em elaboração')
        @include('disciplinas.partials.form')
    @endif
    
@endsection  