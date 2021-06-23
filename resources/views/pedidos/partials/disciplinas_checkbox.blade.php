
<div class="container">
  <div class="row">  
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">
              @if($pedido->status != "Análise")
                Status
              @else
                Selecionar
              @endif
            </th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Nota</th>
            <th scope="col">Crédito</th>
            <th scope="col">Carga horária</th>
            <th scope="col">Código USP</th>
            <th scope="col">Ementa</th>
            @if($pedido->status != "Em elaboração")
            <th scope="col" style="display: none;"></th>
            @else
            <th scope="col">Excluir Disciplina</th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach($pedido->disciplinas->sortBy('tipo') as $disciplina)  
          <tr>
            <td>
                @if($disciplina->status() == 'Análise')
                    <input type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}">
                @else
                    {{ $disciplina->status() }}
                @endif
            </td>
            <td>{{ $disciplina->nome }}</td>
            <td>{{ $disciplina->tipo }}</td>
            <td>{{ $disciplina->nota }}</td>
            <td>{{ $disciplina->creditos }}</td>
            <td>{{ $disciplina->carga_horaria }}</td>
            <td>{{ $disciplina->codigo }}</td>
            <td>
                @if($disciplina->tipo =="Obrigatória")
                <a href="/disciplinas/{{ $disciplina->id }}/showfile"><i class="far fa-file-pdf"></i></a> 
                @endif
            </td>
            @if($pedido->status == "Em elaboração")
            <td>
              <form method="POST" action="/disciplinas/{{$disciplina->id}}"> 
                  @csrf
                  @method('delete')
              <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
              </form>  
            </td>
            @else
            <td style="display: none;"></td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @include('files.index') 
</div>