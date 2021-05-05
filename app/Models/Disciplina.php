<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Disciplina extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function record(){
        return $this->belongsTo(Pedido::class);
    }

    const status = [
        'Análise',
        'Comissão de Graduação',
        'Serviço de Graduação',
        'Docente',
        'Finalização ccint'
    ];

    const tipo = [
        'Obrigatoria',
        'Optativa Livre',
        'Optativa Eletiva',
    ];

    public function files()
    {
        return $this->hasMany('App\Models\FileDisciplina');
    }
}
