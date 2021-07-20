<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instituicao;
use App\Models\Pais;

class Instituicao extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pais(){
        return $this->belongsTo(Pais::class);
    }
}
