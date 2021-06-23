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
            $disciplina->setStatus('Análise', $request->reason);
        }
       
        Mail::queue(new email_analise_aluno($pedido));
        Mail::queue(new email_analise_ccint($pedido));
        return redirect("/pedidos/$pedido->id");
    }

    public function deferimento(Request $request, Pedido $pedido){
        $this->authorize('admin');

        foreach($request->disciplinas as $id){
            $disciplina = Disciplina::where('id',$id)->first();
            $disciplina->setStatus($request->deferimento);
        }

        #Mail::queue(new RetornarAnaliseMail($pedido));
        return redirect("/pedidos/$pedido->id");
    }

    /*
    public function retornar_analise(Pedido $pedido){
        $this->authorize('admin');
        
        foreach($pedido->disciplinas as $disciplina) {
            $disciplina->setStatus('Em elaboração');
            $status = $disciplina->status();
            $status->user_id = auth()->user()->id;
            $status->save();
        }

        # Disparar um email
        Mail::queue(new RetornarAnaliseMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }
 */
}
