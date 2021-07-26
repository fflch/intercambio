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
            $countries =  $countries->where('nome',$request->buscastatus);
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
        $this->authorize('admin');
        $country->delete();
        request()->session()->flash('alert-info','País excluído com sucesso.');
        return redirect("/country"); 
    }
}
