<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');
        $countries = new Country;
        if(isset($request->search)) {
            $countries =  $countries->where('nome','LIKE',"%{$request->search}%");
        }

        return view ('countries.index',[
            'countries' => $countries->orderBy('nome','ASC')->paginate(15),
        ]);
    }

    public function create()
    {
         
    }

    public function store(Request $request)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'nome' => 'required',
        ]);
        $country = Country::create($validated);
        $country->save();
        return redirect("/country"); 
    }

    public function show(Country $country)
    {
        $this->authorize('admin');
        return view('countries.show',[
            'country' => $country,
        ]); 
    }

    public function edit(Country $country)
    {
        $this->authorize('admin');
        return view('countries.edit',[
            'country' => $country,
        ]); 
    }
    public function update(Request $request, Country $country)
    {
        $this->authorize('admin');
        $validated = $request->validate([
            'nome' => 'required',
        ]);
        $country->update($validated);
        $country->save();
        return redirect("/country"); 
    }

    public function destroy(Country $country)
    {
        //desabilitado no form
        $this->authorize('admin');

        if($country->instituicao->isNotEmpty()){
            $instituicoes = implode(', ', $country->instituicao->pluck('nome_instituicao')->toArray());
            request()->session()->flash('alert-danger',"País não pode ser deletado, 
            pois existem as seguintes instituições cadastradas nele: {$instituicoes}");
            return redirect("/country"); 
        }

        $country->delete();
        request()->session()->flash('alert-info','País excluído com sucesso.');
        return redirect("/country"); 
    }
}
