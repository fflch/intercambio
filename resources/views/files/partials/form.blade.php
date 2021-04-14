
<form method="post" enctype="multipart/form-data" action="/files">
  @csrf
  <input type="hidden" name="pedido_id" value="{{ $pedido->id }}">
  <input type="file" name="file">
  <button type="submit" class="btn btn-success"> Enviar Arquivos</button>
</form>




