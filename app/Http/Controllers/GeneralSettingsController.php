<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function show(GeneralSettings $settings){
        return view('settings.show', [
            'email_analise_disciplina' => $settings->email_analise_disciplina,  
        ]);
    }
    public function update(Request $request, GeneralSettings $settings){
        $request -> validate ([
            'email_analise_disciplina' => 'required',
        ]);
        $settings->email_analise_disciplina = $request->input('email_analise_disciplina');
        $settings->save();
        return redirect()->back();
    }
}