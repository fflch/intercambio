@if($pedido->status == 'Em elaboração')

    <b>Disciplinas Obrigatórias Cadastradas</b>
    @include('disciplinas.partials.list_by_type',['tipo'=>'Obrigatória'])

    <b>Disciplinas Optativas Livres Cadastradas</b>
    @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Livre'])

    <b>Disciplinas Optativas Eletivas Cadastradas</b>
    @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])

@endif

@if($pedido->status == 'Análise')

    
    <b><a href="/pedidos/{{$pedido->id}}/index_type"> Disciplinas Obrigatórias Cadastradas </a></b>
    
    @include('disciplinas.partials.list_by_type_clear',['tipo'=>'Obrigatória'])
   
    
    <b><a href="/pedidos/{{$pedido->id}}/index_type"> Disciplinas Optativas Livres Cadastradas</a></b>
    
    @include('disciplinas.partials.list_by_type_clear',['tipo'=>'Optativa Livre'])
   
    <b>Disciplinas Optativas Eletivas Cadastradas</b>
    @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])
  

@endif