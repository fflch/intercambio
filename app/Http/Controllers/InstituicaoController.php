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
        $validated = $request->validate([
            'nome_instituicao' => 'required',
            'pais_id' => 'required',
        ]);
        $instituicao = Instituicao::create($validated);
        $instituicao->save();
        return redirect("/pais/{{ $instituicao->pais_id }}");  
    }
    
    public function show(Instituicao $instituicao)
    {
        return view('instituicao.show',[
            'instituicao' => $instituicao
        ]);
    }

    public function edit(Instituicao $instituicao)
    {
        //
    }

    public function update(Request $request, Instituicao $instituicao)
    {
        //
    }

    public function destroy(Instituicao $instituicao)
    {
        //
    }
}
