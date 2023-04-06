<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class email_em_elaboracao_aluno extends Mailable
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
        $subject = 'Pedido de aproveitamento retornado para em elaboração';
        $to = [User::find($this->pedido->user_id)->email];

        $text = str_replace('%nome_aluno',$this->pedido->nome,app(GeneralSettings::class)->email_em_elaboracao_aluno);

        return $this->view('emails.email_em_elaboracao_aluno')
            ->to($to)
            ->bcc(explode(',',env('EMAILS_CCINT')))
            ->subject($subject)
            ->attach(Storage::disk('local')->path($this->pedido->path), [
                'as' => $this->pedido->original_name,
                'mime' => 'application/pdf'
                ])
            ->with([
                'text' => $text,
                'pedido' => $this->pedido,
            ]);
    }
}
