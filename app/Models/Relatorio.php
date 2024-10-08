<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Uspdev\Replicado\Pessoa;
use Uspdev\Replicado\Graduacao;

class Relatorio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function user(){
        return $this->belongsTo(\App\Models\User::class);
    }

    public function instituicao(){
        return $this->belongsTo(\App\Models\Instituicao::class);
    }
    public function country(){
        return $this->belongsTo(\App\Models\Country::class);
    } 
    public function pedido(){
       return $this->BelongsTo(\App\Models\Pedido::class);
    }

}
