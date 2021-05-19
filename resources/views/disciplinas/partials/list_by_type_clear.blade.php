<ul>
@forelse($pedido->disciplinas()->where('tipo',$tipo)->get() as $disciplina)
    <li>{{ $disciplina->nome ?? '' }}</a></li>
@empty 
    <li>Não há nenhum cadastrado</li>
@endforelse
</ul>