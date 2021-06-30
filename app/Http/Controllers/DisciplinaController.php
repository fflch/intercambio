<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest;
use Illuminate\Support\Facades\Storage;
use App\Service\Utils;

class DisciplinaController extends Controller
{
    public function store(DisciplinaRequest $request)
    {
        # TODO: Disciplinas só podem ser inseridas quando o pedido está em elaboração
        $this->authorize('grad');
        $validated = $request->validated();
        $disciplina = Disciplina::create($validated);
        $disciplina->setStatus('Em elaboração',request()->comentario);
        
        if($request->tipo == "Obrigatória"){
            $disciplina->original_name = $request->file('file')->getClientOriginalName();
            $disciplina->path = $request->file('file')->store('.');
        }

        $disciplina->save();
        request()->session()->flash('alert-info','Disciplina adicionada com sucesso');
        return redirect("/pedidos/{$disciplina->pedido->id}");  
    }

    public function edit(Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);

        if($disciplina->status != 'Indeferido') {
            request()->session()->flash('alert-info','Só é possível realizar revisão de disciplinas indeferidas');
            return redirect("/pedidos/$disciplina->pedido->id");
        }

        return view('disciplinas.edit',[
            'disciplina' => $disciplina,
        ]);
    }

    public function update(Request $request, Disciplina $disciplina)
    {
        /*
        if($disciplina->status == "Análise"){
            
            $request->validate([
                'conversao' => 'required',
            ]);
            $disciplina->conversao = $request;
            $disciplina->save();
        }else{
            */


        $this->authorize('owner',$disciplina->pedido);

        $request->validate([
            'comentario' => 'required',
            'file'     => 'nullable|mimes:pdf|max:10000',
        ]);

        if($disciplina->status != 'Indeferido') {
            request()->session()->flash('alert-info','Só é possível realizar revisão de disciplinas indeferidas');
            return redirect("/pedidos/$disciplina->pedido->id");
        }

        $disciplina->setStatus('Análise',$request->comentario);

        if($request->file){
            # Apagar arquivo antigo
            Storage::delete($disciplina->path);
            # troca o arquivo
            $disciplina->original_name = $request->file('file')->getClientOriginalName();
            $disciplina->path = $request->file('file')->store('.');
        }
        $disciplina->save();
        Utils::updatePedidoStatus($disciplina->pedido);

        return redirect("/pedidos/{$disciplina->pedido->id}");
        
    }

    
   
    public function destroy(Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);
        $pedido_id = $disciplina->pedido_id;
        $disciplina->delete();
        request()->session()->flash('alert-info','Disciplina excluída com sucesso.');
        return redirect("/pedidos/{$pedido_id}"); 
    }

    public function show(Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);
        $stepper->setCurrentStepName($disciplina->status);
        return view('disciplinas.show',[
            'disciplina' => $disciplina
        ]);
    }

    public function showfile(Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);
        return Storage::download($disciplina->path, $disciplina->original_name);
    }
}
