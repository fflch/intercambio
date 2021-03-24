<?php

namespace App\Http\Controllers;

use App\Models\DiscenteOpt;
use Illuminate\Http\Request;
use App\Http\Requests\DiscenteOptRequest;

class DiscenteOptController extends Controller
{
    public function index(Request $request)
    {
         #Campo de busca
         if(isset(request()->search)){
            $discenteOpt = DiscenteOpt::where('nome','LIKE',"%{$request->search}%")
                         ->orWhere('nUSP','LIKE',"%{$request->search}%")->paginate(5);
        }else {
            $discenteOpt = DiscenteOpt::paginate(5);
        }
        return view ('discenteOpt.index',[
            'discenteOpt' => $discenteOpt
        
        ]);
        
    }
    
    
    public function create()
    {
        return view('discenteOpt.create',[
           'discenteOpt' => new DiscenteOpt,
        ]);
    }
    
    public function Store(DiscenteOptRequest $request)
    {

    $validated = $request->validated();
    $discenteOpt = DiscenteOpt::create($validated);
    return redirect("/DiscenteOpt/$discente->id");

    }
    
    
    public function show(DiscenteOpt $discenteOpt)
    {
        return view('discenteOpt.show',[
            'discenteOpt' => $discenteOpt
        ]);
    }
    
    public function edit(DiscenteOpt $discenteOpt)
    {
        return view('discenteOpt.edit',[
            'discenteOpt' => $discenteOpt
        ]);
    }
    
    public function update(Request $request, DiscenteOpt $discenteOpt)
    {
        /*$validated = $request->validated();
        $validated ['user_id'] = auth()->user()->id;
        $inter->update($validated);
        request()->session()->flash('alert-info','Livro atualizado com sucesso');
        return redirect("/inter/{$inter->id}");*/
        $discenteOpt->Nome = $request->Nome;
        $discenteOpt->nUSP = $request->nUSP;
        $discenteOpt->Curso = $request->Curso;
        $discenteOpt->Periodo = $request->Periodo;
        $discenteOpt->Instituicao = $request->Instituicao;
        $discenteOpt->NomeDisciplina = $request->NomeDisciplina;
        $discenteOpt->DataInicial = $request->DataInicial;
        $discenteOpt->DataFinal = $request->DataFinal;
        $discenteOpt->Credito = $request->Credito;
        $discenteOpt->CargaHoraria = $request->CargaHoraria;
        $discenteOpt->Modalidade = $request->Modalidade;
        $discenteOpt->save();
        return redirect("/DiscenteOpt/{$discenteOpt->id}");
    }
    
    public function destroy(DiscenteOpt $discenteOpt)
    {
        $discenteOpt->delete();
        return redirect('/DiscenteOpt');
    }
}
