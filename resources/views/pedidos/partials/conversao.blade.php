<form method="POST" action="/converte"> 
    @csrf
    <select name="disciplina_id">
        @foreach($pedido->disciplinas->where('tipo','!=','Obrigatória')->sortBy('tipo') as $disciplina)
            <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
        @endforeach
        <input name="conversao">
    </select>
    <button type="submit">Converter</button>  
</form>  





