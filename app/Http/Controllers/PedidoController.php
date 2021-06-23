<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use Uspdev\Replicado\Graduacao;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');
        #Campo de busca
        

        if ($request->buscastatus != null && $request->search != null){

            $pedidos = Pedido::where($this->user->codpes == 'user_id','LIKE',"%{$request->search}%")
              ->where(Pedido::getStatus(), $request->buscastatus)->paginate(10);
            
        } else if(isset($request->search)) {
            $pedidos = Pedido::where($this->user->codpes == 'user_id','LIKE',"%{$request->search}%")->paginate(10);
        }
            
        else if(isset($request->buscastatus)){
            $pedidos = Pedido::where(Pedido::getStatus(), $request->buscastatus)->paginate(10);
        } else {
            $pedidos = Pedido::paginate(10);
        }

        return view ('pedidos.index',[
            'pedidos' => $pedidos
        ]);
    }

    public function create()
    {
        $this->authorize('logado');
        return view('pedidos.create',[
        'pedido' => new Pedido,
        ]);
    }

    public function store(PedidoRequest $request)
    {
        $this->authorize('logado');
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated['original_name'] = $request->file('file')->getClientOriginalName();
        $validated['path'] = $request->file('file')->store('.');
        $pedido = Pedido::create($validated);
        request()->session()->flash('alert-info','Cadastro com sucesso');
        return redirect("/pedidos/$pedido->id");
    }

    public function show(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        $codpes = auth()->user()->codpes;

        $curso = Graduacao::curso($codpes,8);
        if(!empty($curso)) {
            $disciplinas = Graduacao::listarDisciplinasGradeCurricular($curso['codcur'], $curso['codhab']);
        } else {
            $disciplinas = [];
        }

        return view('pedidos.show',[
            'pedido' => $pedido,
            'disciplinas' => $disciplinas
        ]);

        
    }

    public function edit(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        return view('pedidos.edit',[
            'pedido' => $pedido
        ]);
    }

    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        $validated = $request->validated();
        $pedido->update($validated);
        request()->session()->flash('alert-info','atualizado com sucesso');
        return redirect("/pedidos/{$pedido->id}");
    }

    public function destroy(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        $pedido->delete();
        return redirect('/pedidos');
    }
}