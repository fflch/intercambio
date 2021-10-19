<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instituicao;
use App\Models\Country;

class Instituicao extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
