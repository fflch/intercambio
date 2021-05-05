<?php

namespace App\Service;

use Axn\LaravelStepper\Stepper;
use App\Models\Disciplina;

class DisciplinaStatus extends Stepper
{
    protected $view = 'stepper::arrows';

    public function register()
    {
        foreach(Disciplina::status as $status){
            $this->addStep($status);
        }
    }
}