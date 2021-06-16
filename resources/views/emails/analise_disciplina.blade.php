TTTTTTTTTTTTTTTTTTTTT

{!! $text !!}

Universidade: {{ $pedido->instituicao }}

@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach