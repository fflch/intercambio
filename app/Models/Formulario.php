<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;

class Formulario extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

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
    
    public function pedido(){
        return $this->belongsTo(\App\Models\Pedido::class);
    }
}
