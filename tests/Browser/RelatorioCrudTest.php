<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RelatorioCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function test_example(): void
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
                ->press('submit');

            $browser->clicklink('Nova solicitação')
                ->clicklink('Reaproveitamento de créditos')
                ->select('id_country')
                ->select('instituicao_id')
                ->select('tipo')
                ->attach('file', $filePath)
                ->press('Enviar')
                ->assertSee("O preenchimento do relatório é obrigatorio para dar continuidade ao pedido");

            $lorem = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";

            $browser->radio('autorizacao', 'simnomecontato')
                ->type('periodo', '6 meses')
                ->type('pescolhadestino', $lorem)
                ->type('pvisto', $lorem)
                ->type('questoesbancarias', $lorem)

                ->radio('segurosaude', 1)
                ->type('segurosauderec', $lorem)

                ->radio('passagens', 1)
                ->type('passagensrec', $lorem)

                ->radio('oferecimentomoradia', 1)
                ->radio('moradia', 1)
                ->type('moradiaexp', $lorem)
                ->radio('moradiaqnt', 1)
                ->radio('proximidade', 1)

                ->type('prepbagagem', $lorem)
                ->type('conhecimentoprevio', $lorem)

                ->radio('registro', 1)
                ->type('registroexp', $lorem)
                ->radio('contabancaria', 1)
                ->type('contabancariaexp', $lorem)
                ->radio('chip', 1)
                ->type('chipexp', $lorem)

                ->radio('transportepublico', 1)
                ->radio('descontotransportepublico', 1)
                ->type('descontotransportepublicoexp', $lorem)

                ->radio('orientacao', 1)
                ->type('orientacaoexp', $lorem)
                ->radio('cursoidioma', 1)
                ->radio('cursoidiomagratuidade', 0)
                ->type('cursoidiomavalor', '50 EUR/mês')

                ->type('matricula', $lorem)
                ->radio('aulasantes', 1)
                ->radio('restauranteuniversitario', 1)
                ->type('restauranteuniversitariovalor', '3 EUR por refeição')
                ->radio('restauranteacessivel', 1)

                ->radio('taxaadm', 1)
                ->type('taxaadmexp', $lorem)
                ->type('expacademica', $lorem)
                ->radio('programaamizade', 1)
                ->type('programaamizadeexp', $lorem)

                ->radio('dificuldadeacompanhamento', 1)
                ->type('dificuldadeacompanhamentoexp', $lorem)
                ->radio('dificuldadeidioma', 1)
                ->type('dificuldadeidiomaexp', $lorem)
                ->type('adaptacao', $lorem)
                ->type('dificuldades', $lorem)

                ->radio('atvintegracao', 1)
                ->type('atvintegracaoexp', $lorem)
                ->radio('bolsa', 1)
                ->radio('bolsasuf', 1)
                ->type('gastomensal', '800 EUR')
                ->radio('atvremunerada', 1)
                ->type('atvremuneradaexp', $lorem)

                ->type('dicas', $lorem)
                ->press('Enviar');

            $browser->clicklink('Meus Pedidos')
                ->press('Deletar')
                ->assertDialogOpened('Tem certeza que deseja excluir?')
                ->acceptDialog();
        });
    }
}