@extends('main')
@section('content')
<ul>
  <li><a href="/DiscenteOpt/{{$discenteOpt->id}}">{{ $discenteOpt->Nome ?? '' }}</a></li>
  <li>{{ $discenteOpt->nUSP ?? '' }}</li>
  <li>{{ $discenteOpt->Curso ?? '' }}</li>
  <li><a href="/DiscenteOpt/{{$discenteOpt->id}}/edit">Responder</a></li>
  <br>
    <form action="/DiscenteOpt/{{ $discenteOpt->id }}" method="post">
  </li> 
</ul>

@endsection