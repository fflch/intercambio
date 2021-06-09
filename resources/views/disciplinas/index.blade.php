
<div class="card-body">
    <div class="row">
        <div class="form-group col-sm-3">
        <b>Disciplinas Obrigatórias</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Obrigatória'])
    </div>
        <div class="form-group col-sm-3">
         <b>Disciplinas Optativas Livres</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Livre'])
    </div> 
        <div class="form-group col-sm-3">
        <b>Disciplinas Optativas Eletivas</b>
        @include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])
    </div>    
 
