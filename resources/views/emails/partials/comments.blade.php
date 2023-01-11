<br>

<b>Histórico dos comentários</b>
<br>

@foreach($pedido->disciplinas as $disciplina)
    <br><hr><br>
    <b>{{ $disciplina->nome }}</b> <br>

    @foreach($disciplina->statuses as $status)
        @if(!empty($status->reason))
            <b> {{\Carbon\Carbon::parse( $status->created_at)->format('d/m/Y H:i') }} - 
            {{ \App\Models\User::find($status->user_id)->name }}:</b>
            {{ $status->reason }} <br>
        @endif
    @endforeach
@endforeach

