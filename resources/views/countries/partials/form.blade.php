<form method="POST" action="/country"> 
  @csrf 
    <input name="nome" placeholder="Adicionar país" style="width: 400px" value="">
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
</form>