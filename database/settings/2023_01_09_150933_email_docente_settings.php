<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class EmailDocenteSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.email_docente', file_get_contents(__DIR__ . "/defaults/email_docente.txt"));
    }
}
