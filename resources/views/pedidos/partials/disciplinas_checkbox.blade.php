@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/comentario.css')}}"/>
@endsection
<div class="card">
  <div>
    <div>  
      <div>
        <table width=100% class="table table-bordered">
          <thead>
            <tr align="center">
              <th scope="col">
                @can('admin')
                  Selecionar
                @else
                  Status
                @endcan
              </th>
              <th scope="col">Nome</th>
              <th scope="col">Tipo</th>
              <th scope="col">Nota</th>
              <th scope="col">
              @if($pedido->status != "Em elaboração")
                Créditos do aluno
              @else
                Créditos
              @endif
              </th>
              <th scope="col">Carga Horária Semestral</th>
              <th scope="col">Código USP</th>
              <th scope="col">Ementa</th>
              <th scope="col">Comentários (passe o mouse para ver o texto completo)</th>
            @if($pedido->status != "Em elaboração")
              <th scope="col" style="display: none;"></th>
            @else
              <th scope="col">Excluir Disciplina</th>
            @endif

            @if($pedido->status == "Em elaboração")
              <th scope="col" style="display: none;"></th> 
            @else
              <th scope="col">Créditos Convertidos</th>
            @endif

            </tr>
          </thead>
          <tbody>
            @foreach($pedido->disciplinas->sortBy('tipo') as $disciplina)  
            <tr>
              <td align="center">
                  @can('admin')
                    @if( $disciplina->status == "Análise" )
                      <input type="checkbox" name="disciplinas[]" value="{{ $disciplina->id }}">
                    @else
                      <i>{{ $disciplina->status }}</i>
                    @endif
                  @else
                      <i>{{ $disciplina->status }}</i>
                      @if($disciplina->status == 'Indeferido')
                        [<a href="/disciplinas/{{ $disciplina->id }}/edit">Solicitar Revisão</a>]
                      @endif
                  @endcan
              </td>
              <td>{{ $disciplina->nome }}</td>
              <td align="center">{{ $disciplina->tipo }}</td>
              <td align="center">{{ $disciplina->nota }}</td>
              <td align="center">{{ $disciplina->creditos }}</td>
              <td align="center">{{ $disciplina->carga_horaria }}</td>
              <td align="center">{{ $disciplina->codigo }}</td>
              <td align="center">
                  @if(!empty($disciplina->path))
                  <a href="/disciplinas/{{ $disciplina->id }}/showfile"><i class="far fa-file-pdf"></i></a> 
                  @endif
              </td>
              <td class="expandir">
                  @foreach($disciplina->statuses as $status)
                    @if(!empty($status->reason))
                      <b>{{ \App\Models\User::find($status->user_id)->name }}
                         ({{\Carbon\Carbon::parse( $status->created_at)->format('d/m/Y H:i') }}):
                      </b><br> {{ $status->reason }} <br>
                    @endif
                  @endforeach
              </td>
            @if($pedido->status == "Em elaboração")
              <td align="center">
                <form method="POST" action="/disciplinas/{{$disciplina->id}}"> 
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Tem certeza que deseja excluir a Disciplina?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
                </form>  
              </td>
            @else
              <td style="display: none;"></td>
            @endif

            @if($pedido->status == "Em elaboração")
              <td scope="col" style="display: none;"></td>      
            @else
              <td scope="col" align="center">{{ $disciplina->conversao }}</td>
            @endif

            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>