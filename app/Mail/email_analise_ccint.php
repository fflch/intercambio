<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Pedido;
use App\Service\GeneralSettings;
use Illuminate\Support\Facades\Storage;

class email_analise_ccint extends Mailable
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
        $subject = 'Aviso de recebimento de pedido de aproveitamento de créditos';
        $to = explode(',',env('EMAILS_CCINT'));

        $text = str_replace('%nome_aluno',$this->pedido->nome,app(GeneralSettings::class)->email_analise_ccint);
        
        return $this->view('emails.email_analise_ccint')
            ->to($to)
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
