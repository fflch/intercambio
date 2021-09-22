<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;
use App\Models\Instituicao;
use App\Models\User;
use Faker\Factory;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;
use Illuminate\Http\UploadedFile;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $user = User::inRandomOrder()->first();
        $file = UploadedFile::fake()->create($faker->text(20) .'pdf');

        $pedido = [   
            'instituicao_id' => Instituicao::inRandomOrder()->pluck('id')->first(),
            'user_id'        => $user->id,
            'original_name'  => $file->getClientOriginalName(),
            'path'           => $file->store('.'),
            // Código do Observer 
            'status'         => 'Em elaboração',
            'codpes'         => $user->codpes,
            'nome'           => Pessoa::nomeCompleto($user->codpes),
            'curso'          => Graduacao::curso($user->codpes, env('REPLICADO_CODUNDCLG'))['nomcur'],
        ];

        // mutar o Observer
        Pedido::withoutEvents(function () use ($pedido) {

            Pedido::create($pedido);
            Pedido::factory(10)->create();

        });

    }
}
