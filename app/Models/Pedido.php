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
   
    public function files()
    {
        return $this->hasMany('App\Models\File');
    }
    public function disciplinas()
    {
        return $this->hasMany('App\Models\Disciplina');
    }
    
    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }
}
