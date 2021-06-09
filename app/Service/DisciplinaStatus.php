<?php

namespace App\Service;

use Axn\LaravelStepper\Stepper;
use App\Models\Disciplina;

class DisciplinaStatus extends Stepper
{
    protected $view = 'laravel-fflch-stepper::main';

    public function register()
    {
        foreach(Disciplina::status as $status){
            $this->addStep($status);
        }
    }
}