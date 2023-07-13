<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class EmailsCgSgSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.email_cg', file_get_contents(__DIR__ . "/defaults/email_cg.txt"));
        $this->migrator->add('general.email_sg', file_get_contents(__DIR__ . "/defaults/email_sg.txt"));
    }
}