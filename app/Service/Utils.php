<?php

namespace App\Service;

use Uspdev\Replicado\Graduacao;

class Utils
{
    public static function disciplinas($codpes)
    {
        $curso = Graduacao::curso($codpes,env('REPLICADO_CODUNDCLG'));
        if(!empty($curso)) {
            return Graduacao::listarDisciplinasGradeCurricular($curso['codcur'], $curso['codhab']);
        } 
        return [];
    }
}