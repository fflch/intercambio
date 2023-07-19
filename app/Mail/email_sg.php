<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Models\Disciplina;
use App\Models\User;
use Uspdev\Replicado\Pessoa;
use App\Service\GeneralSettings;
use Illuminate\Support\Facades\Storage;

class email_sg extends Mailable
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
        $subject = 'Novo pedido de aproveitamento de créditos para SG: ' . $this->pedido->nome;
        $to = explode(',',env('EMAILS_SERVICO_GRADUACAO'));

        $text = str_replace('%nome_aluno',$this->pedido->nome, app(GeneralSettings::class)->email_sg);
        $ccint = explode(',',env('EMAILS_CCINT'));
       
        return $this->view('emails.email_sg')
            ->to($to)
            ->bcc($ccint)
            ->subject($subject)
            ->attach(Storage::disk('local')->path($this->pedido->path), [
                'as' => $this->pedido->original_name,
                'mime' => 'application/pdf'
                ])
            ->with([
                'text' => $text,
                'pedido' => $this->pedido
            ]);
    }
}
