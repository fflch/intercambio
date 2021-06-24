<?php

namespace App\Observers;

use App\Models\Pedido;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;

class PedidoObserver
{
    /**
     * Handle the Pedido "created" event.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */
    public function creating(Pedido $pedido)
    {
        $pedido->status = 'Em elaboração';
        $pedido->codpes = auth()->user()->codpes;
        $pedido->nome = Pessoa::nomeCompleto($pedido->codpes);
        $pedido->curso = Graduacao::curso($pedido->codpes, env('REPLICADO_CODUNDCLG'))['nomcur'];
    }

    /**
     * Handle the Pedido "updated" event.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */
    public function updated(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "deleted" event.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */
    public function deleted(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "restored" event.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */
    public function restored(Pedido $pedido)
    {
        //
    }

    /**
     * Handle the Pedido "force deleted" event.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return void
     */
    public function forceDeleted(Pedido $pedido)
    {
        //
    }
}
