<?php

namespace App\Service;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $email;
    
    public static function group(): string
    {
        return 'general';
    }
}