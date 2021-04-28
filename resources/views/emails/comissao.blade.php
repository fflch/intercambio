Prezados(as) Comissão,

Chegou um novo pedido de análise da comissão:

do aluno: {{ $pedido->codpes }}

Universidade: {{ $pedido->instituicao }}

@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach