<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CountriesCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_countries_crud(): void
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

            $browser->clicklink('Editar')
                ->type('nome', 'Palestina')
                ->press('submit')
                ->assertSee('Palestina');
           
            #Busca
            $browser->type('search', 'Palestina')
                ->press('Buscar')
                ->assertSee('Palestina');
                
            $browser->press('Deletar')
                ->assertDialogOpened('Tem certeza que deseja excluir o País?')
                ->acceptDialog()
                ->assertSee('País excluído com sucesso.');  
        });
    }
}
