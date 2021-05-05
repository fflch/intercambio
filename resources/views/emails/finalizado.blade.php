Prezados(as) Comissão,

O seu pedido de aproveitamento de créditos foi finalizado:

do aluno: {{ $pedido->codpes }}

Universidade: {{ $pedido->instituicao }}

@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach