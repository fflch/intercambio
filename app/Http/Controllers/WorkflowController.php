<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

use Mail;
use App\Mail\AnaliseMail;

class WorkflowController extends Controller
{
    public function analise(Pedido $pedido){
        $pedido->status = 'Análise';

        # Disparar um email
        Mail::queue(new AnaliseMail($pedido));

        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }
}
