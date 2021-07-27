<center> 
  <form method="POST" action="/instituicao"> 
  @csrf 
    <label for="nome_instituicao"><b>Adcionar uma Instituição para {{$country->nome}}</b></label>
    <br>  
    <input name="nome_instituicao" value="" style="width:800px"></input>
    <button name="submit" class="btn btn-success"><i class="fas fa-check"></i></button> 
    <input class="form-control" type="hidden" name="country_id" value="{{ $country->id }}">
  </form>
</center> 
<br>