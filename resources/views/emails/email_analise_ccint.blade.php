{!! $text !!}

Universidade: {{ $pedido->instituicao->nome }}

@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach