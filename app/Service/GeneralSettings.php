<?php

namespace App\Service;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $email_analise_disciplina;
    
    public static function group(): string
    {
        // Corpo do email: em elaboração -> análise

        return 'general';
    }
}