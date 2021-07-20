
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
          <tr>

        @foreach($pais->instituicao->sortBy('nome_instituicao') as $insti)
            <td> {{ $insti->nome_instituicao }} </td>
            <td> 
                <center>
                    <button type="update" style="background-color: transparent;border: none;">
                        <i class="fas fa-pencil-alt" color="#007bff">
                            <a href="">
                        </i>
                    </button>  
                    <form method="POST" action="/pais"> 
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>   
                    </form>  
                </center>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
