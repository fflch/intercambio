<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function show(GeneralSettings $settings){
        return view('settings.show', [
            'email' => $settings->email,  
        ]);
    }
    public function update(Request $request, GeneralSettings $settings){
        $request -> validate ([
            'email' => 'required',
        ]);
        $settings->email = $request->input('email');
        $settings->save();
        return redirect()->back();
    }
}