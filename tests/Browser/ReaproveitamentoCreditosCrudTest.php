<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;

class ReaproveitamentoCreditosCrudTest extends DuskTestCase
{
    
    public function test_reaproveitamento_crud(): void
    {
        $fakeFile = UploadedFile::fake()->create('test_file.pdf', 1000, 'application/pdf');

        $this->browse(function (Browser $browser) use ($fakeFile) {
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
                ->press('submit');

            $browser->clicklink('Nova solicitação')
                ->clicklink('Reaproveitamento de créditos')
                ->select('id_country', 'Brasil')
                ->select('instituicao_id', 'USP')
                ->select('tipo', 'Regular')
                ->attach('file', $fakeFile)
                ->press('Enviar');
        });
    }
}
