<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use App\Http\Requests\DisciplinaRequest;
use App\Service\DisciplinaStatus;
use Illuminate\Support\Facades\Storage;

class DisciplinaController extends Controller
{
    public function store(DisciplinaRequest $request)
    {
        $validated = $request->validated();
        $disciplina = Disciplina::create($validated);
        $disciplina->setStatus('Em elaboração');

        $disciplina->original_name = $request->file('file')->getClientOriginalName();
        $disciplina->path = $request->file('file')->store('.');
        $disciplina->save();

        request()->session()->flash('alert-info','Disciplina adicionada com sucesso');
        return redirect("/disciplinas/{$disciplina->id}");    
    }
   
    public function destroy(Disciplina $disciplina)
    {
        $pedido_id = $disciplina->pedido_id;
        $disciplina->delete();
        request()->session()->flash('alert-info','Disciplina excluída com sucesso.');
        return redirect("/pedidos/{$pedido_id}"); 
    }

    public function show(Disciplina $disciplina, DisciplinaStatus $stepper)
    {
        $stepper->setCurrentStepName($disciplina->status);
        return view('disciplinas.show',[
            'disciplina' => $disciplina,
            'stepper' => $stepper->render()
        ]);
    }

    public function edit(Disciplina $disciplina)
    {
    return view('disciplinas.edit',[
        'disciplina' => $disciplina
        ]);
    }

    public function showfile(Disciplina $disciplina)
    {
    return Storage::download($disciplina->path, $disciplina->original_name);
    }
    
    
}
