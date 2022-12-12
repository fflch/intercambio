<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Disciplina;
use App\Service\GeneralSettings;
use App\Models\User;
use App\Service\Utils;
use Uspdev\Replicado\Pessoa;


class add_email_docente extends Mailable
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
        $this->pedido = 
        $this->disciplina = $disciplina;
        $this->nomeDocente = Pessoa::nomeCompleto($pedido->codpes_docente);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $text = str_replace('%nome_aluno',$this->disciplina->nome,app(GeneralSettings::class)->add_email_docente);

        return $this->view('emails.add_email_docente')
            ->to([User::find($this->disciplina->user_id)->email])
            ->bcc(explode(',',env('EMAILS_CCINT')))
            ->subject('Notificação de inserção do docente para parecer de intercambio')
            ->with([
                'text' => $text,
                'disciplina' => $this->disciplina,
            ]);
    }
}
