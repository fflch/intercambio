<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    public function Pedido(){
        return $this->belongsTo(\App\Models\Pedido::class);
    }

}
