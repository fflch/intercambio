<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;
use App\Traits\HasStatuses;

class Disciplina extends Model
{
    use HasFactory;
    use HasStatuses;

    protected $guarded = ['id'];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    const status = [
        'Em elaboração',
        'Análise',
        'Deferido',
        'Indeferido'
    ];

    const tipos = [
        'Obrigatória',
        'Optativa Livre',
        'Optativa Eletiva',
    ];

    public function files()
    {
        return $this->hasMany('App\Models\FileDisciplina');
    }
}
