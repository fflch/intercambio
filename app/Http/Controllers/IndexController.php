<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IndexController extends Controller
{
    public function index(){
        if( Gate::allows('grad')) return redirect('/meus_pedidos');
        if( Gate::allows('admin')) return redirect('/pedidos');
        return view('index');
    }
}
