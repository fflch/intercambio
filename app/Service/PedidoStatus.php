<?php

namespace App\Service;

use Axn\LaravelStepper\Stepper;
use App\Models\Pedido;

class PedidoStatus extends Stepper
{
    protected $view = 'laravel-fflch-stepper::main';

    public function register()
    {
        foreach(Pedido::status as $status){
            $this->addStep($status);
        }
    }
}