<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Uspdev\Replicado\Graduacao;
use Uspdev\Replicado\Pessoa;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        # alunos de graduação
        Gate::define('grad', function ($user) {
            if(Graduacao::curso($user->codpes, env('REPLICADO_CODUNDCLG'))) return true;
            return false;
        });

        # docente
        Gate::define('docente', function ($user) {
            if(Gate::allows('admin')) return true;
            $vinculos = Pessoa::obterSiglasVinculosAtivos($user->codpes);
            return in_array("SERVIDOR", $vinculos);
        });

        # logado
        Gate::define('logado', function ($user) {
            return true;
        });

        # owner
        Gate::define('owner', function ($user, $model) {
            if(Gate::allows('admin')) return true;
            if(Gate::allows('docente')) return true;
            return $model->user_id == $user->id;
        });

    }
}
