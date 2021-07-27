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
        $this->authorize('admin');
        $instituicao->delete();
        request()->session()->flash('alert-info','País excluído com sucesso.');
        return redirect("/country/$instituicao->country_id"); 
    }
}
