<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Disciplina;
use App\Service\GeneralSettings;

class AnaliseDisciplinaMail extends Mailable
{
    use Queueable, SerializesModels;
    private $disciplina;
    private $settings;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Disciplina $disciplina, GeneralSettings $settings)
    {
        $this->disciplina = $disciplina;
        $this->settings = $settings;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Substituir tokens
        $text = str_replace('%nome_aluno',$pedido->nome,$this->settings->email_analise_disciplina);


        return $this->view('emails.analise_disciplina')
            ->to('ccint@usp.br')
            ->from('sti@usp.br')
            ->subject('Pedido de aproveitamento de créditos para análise recusado')
            ->with([
                'text' => $text,
                'disciplina' => $disciplina
            ]);
    }
}
