<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileDisciplina extends Model
{
    use HasFactory;
    public function Disciplina(){
        return $this->belongsTo(\App\Models\Disciplina::class);
    }

}
