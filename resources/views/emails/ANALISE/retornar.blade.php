Prezado(a) {{ $pedido->codpes }},

Sua solicitação foi devolvida pelo setor ccint.

Chegou um novo pedido de análise de aproveitamento de créditos:
do aluno: {{ $pedido->codpes }}

Universidade: {{ $pedido->instituicao }}

@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach