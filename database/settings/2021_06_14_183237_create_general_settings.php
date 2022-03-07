<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration 
{
    public function up(): void
    {
        $this->migrator->add('general.email_analise_aluno', file_get_contents(__DIR__ . "/defaults/email_analise_aluno.txt"));
        $this->migrator->add('general.email_analise_ccint', file_get_contents(__DIR__. "/defaults/email_analise_ccint.txt"));
        $this->migrator->add('general.email_deferido', file_get_contents(__DIR__. "/defaults/email_deferido.txt"));
        $this->migrator->add('general.email_indeferido', file_get_contents(__DIR__. "/defaults/email_indeferido.txt"));
    }
}
