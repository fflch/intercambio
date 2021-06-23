<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;

class email_deferido extends Mailable
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
        $text = str_replace('%nome_aluno',$this->pedido->nome,app(GeneralSettings::class)->email_deferido);
        
        return $this->view('emails.email_deferido')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Finalização do pedido de aproveitamento de créditos')
            ->with([
                'text' => $text,
                'pedido' => $this->pedido,
            ]);
    }
}
