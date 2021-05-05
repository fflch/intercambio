
<b>Disciplinas Obrigatórias Cadastradas</b>
@include('disciplinas.partials.list_by_type',['tipo'=>'Obrigatória'])

<b>Disciplinas Optativas Livres Cadastradas</b>
@include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Livre'])

<b>Disciplinas Optativas Eletivas Cadastradas</b>
@include('disciplinas.partials.list_by_type',['tipo'=>'Optativa Eletiva'])

