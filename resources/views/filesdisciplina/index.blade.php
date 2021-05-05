<b>Arquivos cadastrados</b>
<br><br>

<ul>
@forelse($disciplina->filesdisciplina as $file)
<li><a href="/filesdisciplina/{{$file->id}}">{{ $file->original_name ?? '' }} 
</a></li>
@empty
<li>Não há nenhum cadastrado</li>
@endforelse