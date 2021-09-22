<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pedido;
use App\Models\Instituicao;
use App\Models\User;
use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;
use Illuminate\Http\UploadedFile;


class PedidoFactory extends Factory
{
    protected $model = Pedido::class;

    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $file = UploadedFile::fake()->create($this->faker->text(20) .'pdf');

        return [
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
    }
}
