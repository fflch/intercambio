<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Selecionar</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Nota</th>
            <th scope="col">Crédito</th>
            <th scope="col">Carga horária</th>
            <th scope="col">Código USP</th>
            <th scope="col">Ementa</th>
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
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
</div>