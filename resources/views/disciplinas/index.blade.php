
@foreach($pedido->disciplinas as $disciplina)
<b>Disciplinas Obrigatorias Cadastradas</b>
    <br><br>

    <ul>
        @if($disciplina->tipo == 'Obrigatoria')
        <li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }} - {{ $disciplina->codigo ?? '' }} - {{ $disciplina->status ?? '' }}</a></li>
        @else
        <li>Não há nenhum cadastrado</li>
        @endif
    </ul>

<b>Disciplinas Optativas Livres Cadastradas</b>
    <br><br>

    <ul>
        @if($disciplina->tipo == 'Optativa Livre')
        <li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }} - {{ $disciplina->codigo ?? '' }} - {{ $disciplina->status ?? '' }}</a></li>
        @else
        <li>Não há nenhum cadastrado</li>
        @endif
    </ul>

<b>Disciplinas Optativas Eletivas Cadastradas</b>
    <br><br>

    <ul>
        @if($disciplina->tipo == 'Optativa Eletiva')
        <li><a href="/disciplinas/{{$disciplina->id}}">{{ $disciplina->nome ?? '' }} - {{ $disciplina->codigo ?? '' }} - {{ $disciplina->status ?? '' }}</a></li>
        @else
        <li>Não há nenhum cadastrado</li>
        @endif
    </ul>
@endforeach