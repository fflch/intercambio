<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        #Campo de busca
        if(isset(request()->search)){
            $pedidos = Pedido::where('codpes','LIKE',"%{$request->search}%")->paginate(5);
        }else {
            $pedidos = Pedido::paginate(5);
        }
        return view ('pedidos.index',[
            'pedidos' => $pedidos
        ]);
    }

    public function create()
    {
        return view('pedidos.create',[
        'pedido' => new Pedido,
        ]);
    }

    public function store(PedidoRequest $request)
    {
        $validated = $request->validated();
        $validated['status'] = 'Em elaboração';
        $validated['codpes'] = auth()->user()->codpes;
        $pedido = Pedido::create($validated);
        request()->session()->flash('alert-info','Cadastro com sucesso');
        return redirect("/pedidos/$pedido->id");
    }

    public function show(Pedido $pedido)
    {
        return view('pedidos.show',[
            'pedido' => $pedido
        ]);
    }

    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit',[
            'pedido' => $pedido
        ]);
    }

    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $validated = $request->validated();
        $pedido->update($validated);
        request()->session()->flash('alert-info','atualizado com sucesso');
        return redirect("/pedidos/{$pedido->id}");
    }

    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect('/pedidos');
    }

    public function analise(Pedido $pedido){
        $pedido->status = 'Análise';
        $pedido->save();
        return redirect("/pedidos/$pedido->id");
    }
}