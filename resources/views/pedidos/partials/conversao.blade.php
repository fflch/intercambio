<div class="card-body">
    <div class="row">
        <form method="POST" action="/converte"> 
            @csrf
            <label name="conversao"><b>Selecione uma Disciplina Optativa para converter:</b></label>
            <select name="disciplina_id" class="form-control form-control-sm">
                @foreach($pedido->disciplinas->where('tipo','!=','Obrigatória')->sortBy('tipo') as $disciplina)
                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                @endforeach                
            </select>
            <input type="text" class="form-control" id="conversao" name="conversao" maxlength="3">
            <button type="submit" class="btn btn-success">Converter</button>  
        </form>  
    </div>
</div>

