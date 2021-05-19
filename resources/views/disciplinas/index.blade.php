@if($pedido->status == 'Em elaboração')

<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-3">
        <b>Disciplinas Obrigatórias Cadastradas</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Obrigatória'])
    </div>
        <div class="form-group col-sm-3">
         <b>Disciplinas Optativas Livres Cadastradas</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Livre'])
    </div> 
        <div class="form-group col-sm-3">
        <b>Disciplinas Optativas Eletivas Cadastradas</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])
    </div>    
 


@endif

@if($pedido->status == 'Análise')

<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-3">
        <b>Disciplinas Obrigatórias Cadastradas</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Obrigatória'])
    </div>
        <div class="form-group col-sm-3">
        <b><a href="/pedidos/{{$pedido->id}}/index_type"> Disciplinas Optativas Livres Cadastradas</a></b>
        @include('disciplinas.partials.list_by_type_clear',['tipo'=>'Optativa Livre'])
    </div>  
        <div class="form-group col-sm-3">
        <b><a href="/pedidos/{{$pedido->id}}/index_type"> Disciplinas Optativas Eletivas Cadastradas</a></b>
         @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])
    </div>  

@endif