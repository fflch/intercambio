<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index(Pais $pais)
    {
        $paises = Pais::all();
        return view('pais.index',[
            'paises' => $paises
        ]);
    }

    public function create()
    {
         
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required',
        ]);
        $pais = Pais::create($validated);
        $pais->save();
        return redirect("/pais"); 
    }

    public function show(Pais $pais)
    {
        return view('pais.show',[
            'pais' => $pais,
        ]); 
    }

    public function edit(Pais $pais)
    {
        
        return view('pais.edit',[
            'pais' => $pais,
        ]); 
    }
    public function update(Request $request, Pais $pais)
    {
        $validated = $request->validate([
            'nome' => 'required',
        ]);
        $pais->update($validated);
        $pais->save();
        return redirect("/pais"); 
    }

    public function destroy(Pais $pais)
    {
        $pais->delete();
        request()->session()->flash('alert-info','País excluído com sucesso.');
        return redirect("/pais"); 
    }
}
