<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $default = file_get_contents(__DIR__ . "/emails_defaults/analise_disciplina.txt");
        $this->migrator->add('general.email_analise_disciplina', $default);
    }
}
