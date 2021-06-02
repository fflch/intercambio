<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Disciplina;

use Mail;
use App\Mail\AnaliseMail;
use App\Mail\RetornarAnaliseMail;
use App\Mail\FinalizadoMail;

use App\Mail\AnaliseDisciplinaMail;
use App\Mail\ComissaoDisciplinaMail;
use App\Mail\DocenteDisciplinaMail;
use App\Mail\ServicoDisciplinaMail;
use App\Mail\FinalizacaoDisciplinaMail;

use App\Mail\RetornarAnaliseDisciplinaMail;
use App\Mail\RetornarComissaoDisciplinaMail;
use App\Mail\RetornarServicoDisciplinaMail;
use App\Mail\RetornarDocenteDisciplinaMail;

class WorkflowController extends Controller
{

//Rotas Pedidos

    public function analise(Request $request, Pedido $pedido){
        # Mudar o status das disciplinas desse pedido para 'Análise'
        
        $request->validate([
            'reason' => 'required',
        ]);

        foreach($pedido->disciplinas as $disciplina) {
            $disciplina->setStatus('Análise', $request->reason);
            $status = $disciplina->status();
            $status->user_id = auth()->user()->id;
            $status->save();
        }
       
        Mail::queue(new AnaliseMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }

    public function retornar_analise(Pedido $pedido){
        $pedido->status = 'Em elaboração';

        # Disparar um email
        Mail::queue(new RetornarAnaliseMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }

    public function finalizado(Pedido $pedido){
        $pedido->status = 'Finalizado';

        # Disparar um email
        Mail::queue(new FinalizadoMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }

//Rotas Disciplina

    public function analise_disciplina(Disciplina $disciplina){
        $disciplina->status = 'Análise';

        # Disparar um email
        Mail::queue(new AnaliseDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function comissao_graduacao(Disciplina $disciplina){
        $disciplina->status = 'Comissão de Graduação';

        # Disparar um email
        Mail::queue(new ComissaoDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function servico_graduacao(Disciplina $disciplina){
        $disciplina->status = 'Serviço de Graduação';

        # Disparar um email
        Mail::queue(new ServicoDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function docente(Disciplina $disciplina){
        $disciplina->status = 'Docente';

        # Disparar um email
        Mail::queue(new DocenteDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function finalizacao(Disciplina $disciplina){
        $disciplina->status = 'Finalização ccint';

        # Disparar um email
        Mail::queue(new FinalizacaoDisciplinaMail($disciplinao));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

//Rotas de Retorno

    public function retornar_analise_disciplina(Disciplina $disciplina){
        $disciplina->status = 'Análise';

        # Disparar um email
        Mail::queue(new RetornarAnaliseDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function retornar_comissao_graduacao(Disciplina $disciplina){
        $disciplina->status = 'Comissão de Graduação';

        # Disparar um email
        Mail::queue(new RetornarComissaoDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function retornar_servico_graduacao(Disciplina $disciplina){
        $disciplina->status = 'Serviço de Graduação';

        # Disparar um email
        Mail::queue(new RetornarServicoDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }

    public function retornar_docente(Disciplina $disciplina){
        $disciplina->status = 'Docente';

        # Disparar um email
        Mail::queue(new RetornarDocenteDisciplinaMail($disciplina));

        $disciplina->save();
        return redirect("/disciplinas/$disciplina->id");
    }
}
