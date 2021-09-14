<div class="card-body">
    <div class="row">
        <form method="POST" action="/converte"> 
            @csrf
            <label name="conversao"><b>Selecione uma Disciplina Optativa para converter:</b></label><br>
                <select name="disciplina_id" class="form-select">
                    @foreach($pedido->disciplinas->where('tipo','!=','Obrigatória')->sortBy('tipo') as $disciplina)
                        <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                    @endforeach                
                </select>
            <input type="text" style="width: 100px" id="conversao" name="conversao">
            <button type="submit" class="btn btn-success" >Converter</button>  
        </form>  
    </div>
</div>

