<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Disciplina;


class ServicoDisciplinaMail extends Mailable
{
    use Queueable, SerializesModels;
    private $disciplina;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Disciplina $disciplina)
    {
        $this->disciplina = $disciplina;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.servico_graduacao')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Pedido de aproveitamento de créditos para análise recusado')
            ->with([
                'disciplina' => $this->disciplina,
            ]);
    }
}
