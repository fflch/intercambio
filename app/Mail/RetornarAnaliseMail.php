<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;


class RetornarAnaliseMail extends Mailable
{
    use Queueable, SerializesModels;
    private $pedido;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.retornar')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Pedido de aproveitamento de créditos para análise recusado')
            ->with([
                'pedido' => $this->pedido,
            ]);
    }
}
