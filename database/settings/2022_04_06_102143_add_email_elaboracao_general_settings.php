<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddEmailElaboracaoGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.email_em_elaboracao_aluno', file_get_contents(__DIR__. "/defaults/email_em_elaboracao_aluno.txt"));
    }
}
