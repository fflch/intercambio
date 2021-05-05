<ul>
@forelse($pedido->disciplinas()->where('tipo',$tipo)->get() as $disciplina)
    <li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }} - {{ $disciplina->codigo ?? '' }} - {{ $disciplina->status ?? '' }}</a></li>
@empty 
    <li>Não há nenhum cadastrado</li>
@endforelse
</ul>