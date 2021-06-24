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
        return view('disciplinas.edit',[
            'disciplina' => $disciplina,
            'disciplinas' => Utils::disciplinas(auth()->user()->codpes),
            'pedido' => $disciplina->pedido
        ]);
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
