@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('/css/comentario.css')}}"/>
@endsection
@can('admin')
        @if($pedido->status == 'Comissão de Graduação (Em Desenvolvimento)' && !$pedido->disciplinas->isEmpty() )
        <div class="btn-group" role="group">
        <div class="card-body">
            <form method="POST" action="/update_status_pedido/{{$pedido->id}}">
                @csrf 
                <input type="hidden" name="status" value="Análise">
                <br>
                <div class="row">
                    <div class="form-group">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja retornar o pedido para análise? ');" class="btn btn-warning p-2">
                        Retornar o pedido para análise
                        </button>
                    </div>
                </div>
            </form>
            @endcan
            @endif

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
      <th scope="col">Tipo</th>
      @if($pedido->status == "Em elaboração")
      <th scope="col" style="display: none;"></th> 
      @else
      <th scope="col">Créditos Convertidos</th>
      @endif
      
      @if($pedido->status == "Em elaboração")
        <th scope="col">Alterar Disciplina</th>
      @elseif($pedido->status == "Análise")
        @can('admin')
        <th scope="col">Alterar Disciplina</th>
        @endcan
      @else
        <th scope="col" style="display: none;"></th>
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
      <td align="center">{{ $disciplina->tipo }}</td>
      @if($pedido->status == "Em elaboração")
      <td scope="col" style="display: none;"></td>      
      @else
      <td scope="col" align="center">{{ $disciplina->conversao }}</td>
      @endif
    
      @if($pedido->status == "Em elaboração")
        <td align="center">
        <a href="/disciplinas/{{$disciplina->id}}/edit"><i class="fas fa-pencil-alt" color="#007bff"></i></a>
          <form method="POST" action="/disciplinas/{{$disciplina->id}}"> 
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir a Disciplina?');" style="background-color: transparent;border: none;"><i class="far fa-trash-alt" color="#007bff"></i></button>  
          </form> 
        </td>
      @elseif($pedido->status == "Análise")
      @can('admin')
        <td align="center">
          <a href="/disciplinas/{{$disciplina->id}}/edit"><i class="fas fa-pencil-alt" color="#007bff"></i></a>
        </td>
        @endcan
      @else
        <td style="display: none;"></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>