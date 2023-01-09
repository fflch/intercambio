<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Disciplina;
use App\Models\User;
use App\Service\GeneralSettings;
use Illuminate\Support\Facades\Storage;
use Uspdev\Replicado\Pessoa;

class email_docente extends Mailable
{
    use Queueable, SerializesModels;
    private $disciplina;
    private $docente;
    private $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Disciplina $disciplina, $docente, $link)
    {
        $this->disciplina = $disciplina;
        $this->docente = $docente;
        $this->link = $link;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nome_aluno = Pessoa::nomeCompleto($this->disciplina->pedido->codpes);
        $docente = Pessoa::nomeCompleto($this->docente);

        $subject = 'Pedido de equivalência de disciplina obrigatória ' . $nome_aluno;
        if(config('app.debug')){
            $to = explode(',',env('EMAILS_CCINT'));
            $subject = '(Teste) ' . $subject;
        } else {
            $to = [Pessoa::email($this->docente)];
        }

        $text = str_replace('%nome_aluno',$nome_aluno,app(GeneralSettings::class)->email_docente);
        $text = str_replace('%disciplina',$this->disciplina->nome,$text);
        $text = str_replace('%docente',$docente,$text);
        $text = str_replace('%link',$this->link,$text);
        $text = str_replace('%universidade',$this->disciplina->pedido->instituicao->nome_instituicao,$text);

        $ccint = explode(',',env('EMAILS_CCINT'));
       
        return $this->view('emails.email_docente')
            ->to($to)
            ->bcc($ccint)
            ->subject($subject)
            ->attach(Storage::disk('local')->path($this->disciplina->pedido->path), [
                'as' => $this->disciplina->pedido->original_name,
                'mime' => 'application/pdf'
                ])
            ->with([
                'text' => $text,
                'disciplina' => $this->disciplina,
                'pedido' => $this->disciplina->pedido,
            ]);
    }
}
