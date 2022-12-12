<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Pedido;
use App\Models\Disciplina;
use Uspdev\Replicado\Pessoa;
use App\Http\Controllers\Redirect;

use Mail;
use App\Mail\email_analise_aluno;
use App\Mail\email_em_elaboracao_aluno;
use App\Mail\add_email_docente;
use App\Mail\email_analise_ccint;
use App\Mail\email_indeferido;
use App\Mail\email_deferido;
use App\Service\Utils;

class WorkflowController extends Controller
{

    public function updatePedidoStatus(Request $request, Pedido $pedido){
        $this->authorize('owner',$pedido);


        $request->validate([
            'status' => Rule::in(['Em elaboração', 'Análise', 'Comissão de Graduação']),
        ]);

        if($request->status == 'Em elaboração'){
            $request->validate([
                'comentario' => 'required',
            ]);
        }

        if($request->status == 'Comissão de Graduação'){
            foreach($pedido->disciplinas as $disciplina) {
                if($disciplina->tipo != 'Obrigatória' && empty($disciplina->conversao)){
                    request()->session()->flash('alert-danger',"A disciplina {$disciplina->nome} não teve os créditos convertidos");
                    return back();
                }
            }

        }

        foreach($pedido->disciplinas as $disciplina) {
            $disciplina->setStatus($request->status);
        }

        Utils::updatePedidoStatus($pedido);

        if($request->status =='Em elaboração') {
            Mail::queue(new email_em_elaboracao_aluno($pedido));
        }else if($request->status=='Análise') {
            Mail::queue(new email_analise_aluno($pedido));
            Mail::queue(new email_analise_ccint($pedido));
        }
        return redirect("/pedidos/$pedido->id");
    }

    public function sendToServicoDeGraduacao(Request $request, Pedido $pedido){
        $this->authorize('owner',$pedido);

        $request->validate([
            'status' => Rule::in(['Comissão de Graduação', 'Serviço de Graduação']),
        ]);

        foreach($pedido->disciplinas as $disciplina) {
            $disciplina->setStatus($request->status);
        }
        Utils::updatePedidoStatus($pedido);

        return redirect("/pedidos/$pedido->id");

    }


    public function deferimento(Request $request, Pedido $pedido){

        $this->authorize('admin');
        $request->validate([
            # TODO: Rule:in para o campo $request->deferimento e ids das disciplinas
            'deferimento' => 'required',
            'disciplinas' => 'required'
        ]);

        foreach($request->disciplinas as $id){
            $disciplina = Disciplina::where('id',$id)->first();
            if($request->deferimento == 'Deferido'){

                # não vamos deferir disciplinas optativas sem conversão
                if($disciplina->tipo != 'Obrigatória' && empty($disciplina->conversao)){
                    request()->session()->flash('alert-danger',"A disciplina {$disciplina->nome}
                    não foi deferida porque os créditos não foram convertidos");
                } else {
                    $disciplina->setStatus('Deferido',$request->comentario);
                    Mail::queue(new email_deferido($disciplina));
                }
            }

            if($request->deferimento == 'Indeferido'){
                # Se inferido, o motivo é obrigatório
                $request->validate([
                    'comentario' => 'required',
                ]);

                $disciplina->setStatus('Indeferido',$request->comentario);
                Mail::queue(new email_indeferido($disciplina));
            }

            if($request->deferimento == 'Comissão de Graduação'){
                # Se inferido, o motivo é obrigatório
                $request->validate([
                    'comentario' => 'required',
                ]);

                $disciplina->setStatus('Comissão de Graduação',$request->comentario);
            }

        }
        Utils::updatePedidoStatus($pedido);
        return redirect("/pedidos/$pedido->id");
    }

    public function salvardocente(Request $request, Disciplina $disciplina){
        $request->validate([
            "codpes_docente" => "required|integer"
        ]);
        
        $disciplina->codpes_docente = $request->codpes_docente;
        $disciplina->save();

        return redirect("/pedidos/$disciplina->pedido_id");

    // Método auxiliar para automatizar a configuração do status do pedido

    }
}
