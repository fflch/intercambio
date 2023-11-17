<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\GeneralSettings;

class GeneralSettingsController extends Controller
{
    public function show(GeneralSettings $settings){
        $this->authorize('admin');

        return view('settings.show', [
            'email_analise_aluno' => $settings->email_analise_aluno,
            'email_analise_ccint' => $settings->email_analise_ccint,
            'email_em_elaboracao_aluno' => $settings->email_em_elaboracao_aluno,
            'email_deferido' => $settings->email_deferido,
            'email_indeferido' => $settings->email_indeferido,
            'email_docente' => $settings->email_docente,
            'email_cg' => $settings->email_cg,
            'email_sg' => $settings->email_sg,
            'tipos_pedido' =>$settings->tipos_pedido,
        ]);
    }
    public function update(Request $request, GeneralSettings $settings){
        $this->authorize('admin');
        $request->validate([
            'email_analise_aluno' => 'required',
            'email_analise_ccint' => 'required',
            'email_em_elaboracao_aluno' => 'required',
            'email_deferido'    => 'required',
            'email_indeferido'  => 'required',
            'email_docente'  => 'required',
            'email_cg'  => 'required',
            'email_sg'  => 'required',
            'tipos_pedido' => 'required',
        ]);
        $settings->email_analise_aluno = $request->input('email_analise_aluno');
        $settings->email_analise_ccint = $request->input('email_analise_ccint');
        $settings->email_em_elaboracao_aluno = $request->input('email_em_elaboracao_aluno');
        $settings->email_deferido = $request->input('email_deferido');
        $settings->email_indeferido = $request->input('email_indeferido');
        $settings->email_docente = $request->input('email_docente');
        $settings->email_cg = $request->input('email_cg');
        $settings->email_sg = $request->input('email_sg');
        $settings->tipos_pedido = $request->input('tipos_pedido');
        $settings->save();
        return redirect()->back();
    }
}
