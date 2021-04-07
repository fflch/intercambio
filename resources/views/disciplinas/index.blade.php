<b>Disciplinas cadastradas</b>
<br><br>

<ul>
@forelse($pedido->disciplinas as $disciplina)
<li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }} - {{ $disciplina->codigo ?? '' }}</a></li>
@empty
<li>Não há nenhum cadastrado</li>
@endforelse
</ul>