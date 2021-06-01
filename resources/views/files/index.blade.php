        <div class="form-group col-sm-3">
            <div class="form-group">
                <b>Arquivos cadastrados</b>
            <ul>
                @forelse($pedido->files as $file)
                <li><a href="/files/{{$file->id}}">{{ $file->original_name ?? '' }} </a></li>
                @empty
                <li>Não há nenhum cadastrado</li>
                @endforelse
            </div>
            <div class="form-group">
            <br>
                <form method="post" enctype="multipart/form-data" action="/files">
                @csrf
                <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
                <input type="file" name="file">
                <br>
                <br>
                <button type="submit" class="btn btn-success"> Enviar Arquivos</button>
                </form>
            </div>
        </div>
    </div>
</div>