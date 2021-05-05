
<div class="card-header"><b>Se necessário indexe arquivos para compravação</b></div>
    <div class="card-body">
    

<form method="post" enctype="multipart/form-data" action="/files">
  @csrf
  <input type="hidden" name="disciplina_id" value="{{ $disciplina->id }}">
  <input type="file" name="file">
  <button type="submit" class="btn btn-success"> Enviar Arquivos</button>
</form>



</div>
</div>
</div>


