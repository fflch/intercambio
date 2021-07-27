
<div class="container" >
  <div class="row">  
    <div class="col-12" >
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col"><h3>Nome</h3></th>
            <th scope="col" style="width:15px"><h3>Alterações</h3></th>
          </tr>
        </thead>
        <tbody> 
        @foreach($country->instituicao->sortBy('nome_instituicao') as $insti) 
          <tr>
            <td>{{$insti->nome_instituicao}}</td>
            <td align="center">
              <a href="/instituicao/{{$insti->id}}/edit"><i class="fas fa-pencil-alt" color="#007bff"></i></a>
              <form method="POST" action="/instituicao/{{$insti->id}}"> 
                  @csrf
                  @method('delete')
                  <button type="submit" onclick="return confirm('Tem certeza que deseja excluir a Disciplina?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
              </form>   
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
