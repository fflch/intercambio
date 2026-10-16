<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Http\UploadedFile;

class PedidoCrudTest extends DuskTestCase
{
    
    public function test_pedido_crud(): void
    {
        $filePath = sys_get_temp_dir() . '/fake_teste_' . time() . '.pdf';
        file_put_contents($filePath, '%PDF-1.4\n%Arquivo falso para testes do Dusk\n');
    
        $this->browse(function (Browser $browser) use ($filePath) {
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

            $browser->clicklink('Nova solicitação')
                ->clicklink('Reaproveitamento de créditos')
                ->select('id_country')
                ->select('instituicao_id')
                ->select('tipo')
                ->attach('file', $filePath)
                ->press('Enviar')
                ->assertSee("O preenchimento do");
            
            $browser->radio('autorizacao', 'simnomecontato');
        });

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
