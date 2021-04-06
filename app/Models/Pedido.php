<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;

class Pedido extends Model
{
    use HasFactory;

    const status = [
        'Em elaboração',
        'Análise ccint',
        'Comissão de Graduação',
        'Serviço de Graduação',
        'Docente',
        'Finalização ccint'
    ];

    public function getNomeAttribute($value){
        return Pessoa::nomeCompleto($this->codpes);
    }

    public function getCursoAttribute($value){
        $curso = Graduacao::curso($this->codpes, 8);
        return $curso['nomcur'];
    }

   
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
    public function disciplinas()
    {
        return $this->hasMany('App\Models\Disciplina');
    }
    
}
