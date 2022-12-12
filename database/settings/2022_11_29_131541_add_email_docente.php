<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class addEmailDocente extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.add_email_docente', file_get_contents(__DIR__. "/defaults/add_email_docente.txt"));
    }
}
