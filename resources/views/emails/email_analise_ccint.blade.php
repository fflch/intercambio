{!! $text !!}

<br>
Universidade: {{ $pedido->instituicao->nome }}

<br>
@foreach($pedido->disciplinas as $disciplina)
    {{ $disciplina->nome }} <br>
@endforeach

<br>
@include('emails.partials.comments')