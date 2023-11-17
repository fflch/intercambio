<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddTiposPedido extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.tipos_pedido', 'Regular');
    }
}
