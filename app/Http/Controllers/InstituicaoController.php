<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'nome_instituicao' => 'required',
            'country_id' => 'required',
        ]);
        $instituicao = Instituicao::create($validated);
        $instituicao->save();
        return redirect("/country/$instituicao->country_id");  
    }
    
    public function show(Instituicao $instituicao)
    {
        $this->authorize('admin');
        return view('instituicao.show',[
            'instituicao' => $instituicao->paginate(15),
        ]);
    }

    public function edit(Instituicao $instituicao)
    {
        $this->authorize('admin');
        return view('instituicao.edit',[
            'instituicao' => $instituicao,
        ]); 
    }

    public function update(Request $request, Instituicao $instituicao)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'nome_instituicao' => 'required',
        ]);
        $instituicao->update($validated);
        $instituicao->save();
        return redirect("/country/$instituicao->country_id"); 
    }

    public function destroy(Instituicao $instituicao)
    {
        //desabilitado no form
        $this->authorize('admin');
        
        if($instituicao->pedidos->isNotEmpty()){
            $pedidos = implode(', ', $instituicao->pedidos->pluck('nome')->toArray());
            request()->session()->flash('alert-danger',"Instituição não pode ser deletada, 
            pois existem os seguintes pedidos cadastradas dos(as): {$pedidos}");
            return redirect("/country/$instituicao->country_id"); 
        }

        $instituicao->delete();
        request()->session()->flash('alert-info','Instituição excluída com sucesso.');
        return redirect("/country/$instituicao->country_id"); 
    }
}
