<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function instituicao()
    {
        return $this->hasMany('App\Models\Instituicao');
    }

    public function pedido()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
