<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;

class email_indeferido extends Mailable
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
        //colocar um campo motivo
        $text = str_replace('%motivo',$this->pedido->nome,app(GeneralSettings::class)->email_indeferido);
        
        return $this->view('emails.email_indeferido')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Novo pedido de aproveitamento de créditos para análise')
            ->with([
                'text' => $text,
                'pedido' => $this->pedido,
            ]);
    }
}
