<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InstitutionCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clicklink('Entrar')
                ->type('loginUsuario', 111111)
                ->press('Login')
                ->waitForText('Sair');
                            
            $browser->clicklink('Países')
                ->type('nome', 'Brasil')
                ->press('submit')
                ->assertSee('Brasil');

            $browser->clicklink('Brasil')
                ->waitForText('Adicionar uma Instituição para Brasil')
                ->type('nome_instituicao', 'Universidade de São Paulo')
                ->press('submit')
                ->assertSee('Universidade de São Paulo');

            $browser->clicklink('Editar')
                ->type('nome_instituicao', 'USP')
                ->press('submit')
                ->assertSee('USP');

            $browser->press('Deletar')
                ->assertDialogOpened('Tem certeza que deseja excluir a Instituição?')
                ->acceptDialog()
                ->assertSee('Instituição excluída com sucesso.');
        });
    }
}
