<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;

class Pedido extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    # talvez não precise ?
    const status = [
        'Em elaboração',
        'Análise',
        'Finalizado',
    ];

    public function getStatus(){

    $status = [
        'Em elaboração' => [
        'name' => "Em Elaboração",
        ],
        'Análise' => [
        'name' => "Análise",       
        ],
        'Finalizado' => [
        'name' => "Finalizado",       
        ],
        
        ];
        
        return $status;
    }

    public function getNomeAttribute($value){
        return Pessoa::nomeCompleto($this->codpes);
    }

    public function getCursoAttribute($value){
        $curso = Graduacao::curso($this->codpes, 8);
        if($curso['nomcur']) return $curso['nomcur'];
        return 'Não matriculado em nenhum curso de Graduação';
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
