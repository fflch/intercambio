<?php

namespace App\Http\Controllers;

use App\Models\Discente;
use Illuminate\Http\Request;
use App\Http\Requests\DiscenteRequest;

class DiscenteController extends Controller
{
    public function index(Request $request)
{
     #Campo de busca
     if(isset(request()->search)){
        $discentes = Discente::where('Nome','LIKE',"%{$request->search}%")
                     ->orWhere('nUSP','LIKE',"%{$request->search}%")->paginate(5);
    }else {
        $discentes = Discente::paginate(5);
    }
    return view ('discente.index',[
        'discentes' => $discentes
    
    ]);
    
}


public function create()
{
    return view('discente.create',[
       'discente' => new Discente,
    ]);
}

public function Store(DiscenteRequest $request)
{
    
    
    $validated = $request->validated();
    $discente = Discente::create($validated);
    request()->session()->flash('alert-info','Cadastro com sucesso');
    return redirect("/Discente/$discente->id");
   

    /*$discente = new Discente;
    $discente->Nome = $request->Nome;
    $discente->nUSP = $request->nUSP;
    $discente->Curso = $request->Curso;
    $discente->Instituicao = $request->Instituicao;
    $discente->NomeDisciplina = $request->NomeDisciplina;
    $discente->Nota = $request->Nota;
    $discente->Credito = $request->Credito;
    $discente->CargaHoraria = $request->CargaHoraria;
    $discente->Codigo = $request->Codigo;
    $discente->NomeUsp = $request->NomeUsp;
    $discente->save();
    return redirect("/Discente/{$discente->id}");*/
}


public function show(Discente $discente)
{
    return view('discente.show',[
        'discente' => $discente
    ]);
}

public function edit(Discente $discente)
{
    return view('discente.edit',[
        'discente' => $discente
    ]);
}

public function update(DiscenteRequest $request, Discente $discente)
{
    /*$validated = $request->validated();
    $validated ['user_id'] = auth()->user()->id;
    $inter->update($validated);
    request()->session()->flash('alert-info','Livro atualizado com sucesso');
    return redirect("/inter/{$inter->id}");*/
    $disc->Nome = $request->Nome;
    $disc->nUSP = $request->nUSP;
    $disc->Curso = $request->Curso;
    $disc->Instituicao = $request->Instituicao;
    $disc->NomeDisciplina = $request->NomeDisciplina;
    $disc->Nota = $request->Nota;
    $disc->Credito = $request->Credito;
    $disc->CargaHoraria = $request->CargaHoraria;
    $disc->Codigo = $request->Codigo;
    $disc->NomeUsp = $request->NomeUsp;
    $disc->save();
    return redirect("/Discente/{$disc->id}");
}

public function destroy(Discente $discente)
{
    $discente->delete();
    return redirect('/Discente');
}
}