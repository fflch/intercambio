<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function instituicao()
    {
        return $this->hasMany('App\Models\Instituicao');
    }
}
