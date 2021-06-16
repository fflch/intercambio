<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;

class AnaliseMail extends Mailable
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
        $text = str_replace('%nome_aluno',$this->pedido->nome,app(GeneralSettings::class)->email_analise_disciplina);
        
        return $this->view('emails.analise')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Novo pedido de aproveitamento de créditos para análise')
            ->with([
                'text' => $text,
                'pedido' => $this->pedido,
            ]);
    }
}
