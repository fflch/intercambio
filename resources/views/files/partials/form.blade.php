
<div class="card-header"><b>Se necessário anexe arquivos para comprovação</b></div>
    <div class="card-body">
    

<form method="post" enctype="multipart/form-data" action="/files">
  @csrf
  <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
  <input type="file" name="file">
  <button type="submit" class="btn btn-success"> Enviar Arquivos</button>
</form>

</div>
</div>
</div>


