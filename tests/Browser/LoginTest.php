<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Entrar')
                ->clickLink('Entrar')
                ->assertSee('Senhaunica-faker')
                ->type('loginUsuario', 111111)
                ->press('Login')
                ->waitForText('Sair');
        });
    }
}
