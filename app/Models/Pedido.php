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
        'Teste Comissão de Graduação',
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
                'Teste Comissão de Graduação' => [
                    'name' => "Teste Comissão de Graduação",       
                ], 
                'Finalizado' => [
                    'name' => "Finalizado",       
                ],
            ];
            
            return $status;
    }
   
    public function disciplinas()
    {
        return $this->hasMany('App\Models\Disciplina');
    }
    
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function instituicao(){
        return $this->belongsTo(\App\Models\Instituicao::class);
    }
}
