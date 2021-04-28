<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

use Mail;
use App\Mail\AnaliseMail;
use App\Mail\RetornarAnaliseMail;
use App\Mail\ComissaoMail;

class WorkflowController extends Controller
{
    public function analise(Pedido $pedido){
        $pedido->status = 'Análise';

        # Disparar um email
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

    public function comissao(Pedido $pedido){
        $pedido->status = 'Comissão de Graduação';

        # Disparar um email
        Mail::queue(new ComissaoMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }
}
