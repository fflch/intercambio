<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReaproveitamentoCreditosCrudTest extends DuskTestCase
{
    
    public function test_reaproveitamento_crud(): void
    {
        $filePath = public_path('test_file.txt');
        file_put_contents($filePath, 'Esse documento é teste.');

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
                ->type('nome_instituicao', 'USP')
                ->press('submit')
                ->assertSee('USP');

            $browser->clicklink('Nova Solicitação')
                ->clicklink('Reaproveitamento de créditos')
                ->select('id_country', 'Brasil')
                ->select('instituicao_id', 'USP')
                ->select('tipo', 'Regular')
                ->attach('file', $filePath)
                ->press('Enviar');
        });

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
