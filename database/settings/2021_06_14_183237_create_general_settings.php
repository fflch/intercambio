<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $default = file_get_contents(__DIR__ . "/emails_defaults/email_analise_aluno.txt");
        $default1 = file_get_contents(__DIR__. "/emails_defaults/email_analise_ccint.txt");
        $default2 = file_get_contents(__DIR__. "/emails_defaults/email_deferido.txt");
        $default3 = file_get_contents(__DIR__. "/emails_defaults/email_indeferido.txt");

        $this->migrator->add('general.email_analise_aluno', $default);
        $this->migrator->add('general.email_analise_ccint', $default1);
        $this->migrator->add('general.email_deferido', $default2);
        $this->migrator->add('general.email_indeferido', $default3);
    }
}
