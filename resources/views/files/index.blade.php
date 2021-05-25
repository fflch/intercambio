        <div class="form-group col-sm-3">
            <b>Arquivos cadastrados</b>

        <ul>
            @forelse($pedido->files as $file)
            <li><a href="/files/{{$file->id}}">{{ $file->original_name ?? '' }} </a></li>
            @empty
            <li>Não há nenhum cadastrado</li>
            @endforelse
        </div>
    </div>
</div>