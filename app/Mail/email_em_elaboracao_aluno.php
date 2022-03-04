<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;
use App\Models\User;

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
        $text = str_replace('%nome_aluno',$this->pedido->nome,app(GeneralSettings::class)->email_em_elaboracao_aluno);
        //dd(app(GeneralSettings::class));
        $to = [User::find($this->pedido->user_id)->email];
        $ccint = explode(',',env('EMAILS_CCINT'));

        return $this->view('emails.email_analise_aluno')
            ->to($to)
            ->bcc($ccint)
            ->subject('Pedido de aproveitamento retornado para em elaboração')
            ->with([
                'text' => $text,
                'pedido' => $this->pedido,
            ]);
    }
}
