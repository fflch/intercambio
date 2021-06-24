<?php

namespace App\Observers;

use App\Models\Disciplina;

class DisciplinaObserver
{
    public function created(Disciplina $disciplina)
    {
    }

    /**
     * Handle the Disciplina "deleted" event.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return void
     */
    public function deleted(Disciplina $disciplina)
    {
        //
    }

    /**
     * Handle the Disciplina "restored" event.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return void
     */
    public function restored(Disciplina $disciplina)
    {
        //
    }

    /**
     * Handle the Disciplina "force deleted" event.
     *
     * @param  \App\Models\Disciplina  $disciplina
     * @return void
     */
    public function forceDeleted(Disciplina $disciplina)
    {
        //
    }
}
