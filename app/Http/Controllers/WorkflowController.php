<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Disciplina;

use Mail;
use App\Mail\email_analise_aluno;
use App\Mail\email_analise_ccint;
use App\Mail\email_indeferido;
use App\Mail\email_deferido;


class WorkflowController extends Controller
{

    // Em Elaboração -> Análise
    public function analise(Request $request, Pedido $pedido){
        # Mudar o status das disciplinas desse pedido para 'Análise'
        $this->authorize('owner',$pedido);

        foreach($pedido->disciplinas as $disciplina) {
            $disciplina->setStatus('Análise');
        }
        $this->updatePedidoStatus($pedido);
       
        Mail::queue(new email_analise_aluno($pedido));
        Mail::queue(new email_analise_ccint($pedido));
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
                $disciplina->setStatus('Deferido',$request->comentario);
                Mail::queue(new email_deferido($disciplina));
            }
            if($request->deferimento == 'Indeferido'){
                # Se inferido, o motivo é obrigatório
                $request->validate([
                    'comentario' => 'required',
                ]);

                $disciplina->setStatus('Indeferido',$request->comentario);
                Mail::queue(new email_indeferido($disciplina));
            }

        }
        $this->updatePedidoStatus($pedido);
        return redirect("/pedidos/$pedido->id");
    }


    // Método auxiliar para automatizar a configuração do status do pedido
    private function updatePedidoStatus(Pedido $pedido){
        # Se nesse pedido não tem nenhum disciplina: 'Em elaboração'
        $disciplinas = $pedido->disciplinas;

        if($disciplinas->isEmpty()) {
            $pedido->status = 'Em elaboração';
            $pedido->save();
            return;
        } 
        
        foreach($disciplinas as $disciplina){
            # Se nesse pedido existir alguma disciplina em elaboração status do pedido será em 'Em elaboração'
            if($disciplina->status=='Em elaboração') {
                $pedido->status = 'Em elaboração';
                $pedido->save();
                return;
            }

            # Se nesse pedido existir alguma disciplina em análise status do pedido será em 'Em elaboração'
            if($disciplina->status=='Análise') {
                $pedido->status = 'Análise';
                $pedido->save();
                return;
            }
        }

        $pedido->status = 'Finalizado';
        $pedido->save();
        return;
    }
}
