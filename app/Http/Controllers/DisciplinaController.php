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
        $this->authorize('grad');
        $validated = $request->validated();
        $disciplina = Disciplina::create($validated);
        $disciplina->setStatus('Em elaboração',request()->comentario);

        if(!empty($request->file)){
            $disciplina->original_name = $request->file('file')->getClientOriginalName();
            $disciplina->path = $request->file('file')->store('.');
        }
        $disciplina->save();
        request()->session()->flash('alert-info','Disciplina adicionada com sucesso.');
        return redirect("/pedidos/{$disciplina->pedido->id}");  
    }

    public function edit(Disciplina $disciplina)
    {
        
        $this->authorize('owner',$disciplina->pedido);
        if($disciplina->status == "Análise" ){
            $this->authorize('admin');
        } 
        return view('disciplinas.edit',[
            'disciplina' => $disciplina,
            'materias' => Utils::disciplinas(auth()->user()->codpes),
        ]);
    }

    public function update(DisciplinaRequest $request, Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);
        if($disciplina->status == "Análise" ){
            $this->authorize('admin');
        } 
        $validated = $request->validated();
        $disciplina->update($validated);
        
        if($disciplina->status == 'Indeferido'){
            $disciplina->setStatus('Análise',$request->comentario);
            Utils::updatePedidoStatus($disciplina->pedido);
        } elseif ($disciplina->status == 'Análise'){
            $disciplina->setStatus('Análise',$request->comentario);
        } else{
            $disciplina->setStatus('Em elaboração',request()->comentario);
        }
        if($request->tipo == "Obrigatória"){
            # Apagar arquivo antigo
            Storage::delete($disciplina->path);
            # troca o arquivo
            $disciplina->original_name = $request->file('file')->getClientOriginalName();
            $disciplina->path = $request->file('file')->store('.');
        } else {
            Storage::delete($disciplina->path);
            $disciplina->original_name = NULL;
            $disciplina->path = NULL;
        }
        $disciplina->save();
        

        return redirect("/pedidos/{$disciplina->pedido->id}");
    }
   
    public function destroy(Disciplina $disciplina)
    {
        //desabilitado no form
        $this->authorize('owner',$disciplina->pedido);
        Storage::delete($disciplina->path);
        $pedido_id = $disciplina->pedido_id;
        $disciplina->delete();
        request()->session()->flash('alert-info','Disciplina excluída com sucesso.');
        return redirect("/pedidos/{$pedido_id}"); 
    }

    public function showfile(Disciplina $disciplina)
    {
        $this->authorize('owner',$disciplina->pedido);
        return Storage::download($disciplina->path, $disciplina->original_name);
    }

    public function converte(Request $request)
    {
        $request->validate([
            'conversao' => 'required|integer',
        ]);

        $this->authorize('admin');
        $disciplina = Disciplina::find($request->disciplina_id);

        if($disciplina){
            $disciplina->conversao = $request->conversao;
            $disciplina->save();
        }
        return back();
    }
  
}
