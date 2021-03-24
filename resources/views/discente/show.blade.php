@extends('main')
@section('content')
<ul>
  <li>{{ $discente->Nome ?? '' }}</a></li>
  <li>{{ $discente->nUSP ?? '' }}</li>
  <li>{{ $discente->Curso ?? '' }}</li>
  <li><a href="/Discente/{{$discente->id}}/edit">Conferir</a></li>
  <br>
    <form action="/Discente/{{ $discente->id }}" method="post">
  </li> 
</ul>
@endsection  