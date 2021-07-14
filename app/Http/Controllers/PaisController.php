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
            'paises' => $paises,
            'pais' => $pais,
        ]);
    }

    public function create()
    {
       
    }

    public function store(Request $request)
    {
      
    }

    public function show(Pais $pais)
    {
        
    }

    public function edit(Livro $livro)
    {
        
    }

    public function update(Request $request, Livro $livro)
    {
        
    }

    public function destroy(Livro $livro)
    {
        
    }
}
