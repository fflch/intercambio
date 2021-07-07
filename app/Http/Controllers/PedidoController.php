<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use Uspdev\Replicado\Graduacao;
use App\Service\PedidoStatus;
use App\Service\Utils;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');
        $pedidos = new Pedido;
        if(isset($request->buscastatus)) {
            $pedidos =  $pedidos->where('status',$request->buscastatus);
        }

        if(isset($request->search)) {
            $pedidos =  $pedidos->where('codpes','LIKE',"%{$request->search}%")
                                ->orWhere('nome','LIKE',"%{$request->search}%");
        }

        return view ('pedidos.index',[
            'pedidos' => $pedidos->get()
        ]);
    }

    public function create()
    {
        $this->authorize('grad');
        return view('pedidos.create',[
        'pedido' => new Pedido,
        ]);
    }

    public function store(PedidoRequest $request)
    {
        $this->authorize('grad');
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        $validated['original_name'] = $request->file('file')->getClientOriginalName();
        $validated['path'] = $request->file('file')->store('.');
        $pedido = Pedido::create($validated);
        $pedido->save();

        request()->session()->flash('alert-info','Cadastro com sucesso');
        return redirect("/pedidos/$pedido->id");
    }

    public function show(Pedido $pedido, PedidoStatus $stepper)
    {
        $this->authorize('owner',$pedido);

        $stepper->setCurrentStepName($pedido->status);
        $codpes = auth()->user()->codpes;

        return view('pedidos.show',[
            'pedido' => $pedido,
            'disciplinas' => Utils::disciplinas(auth()->user()->codpes),
            'stepper' => $stepper->render()
        ]);
    }
    public function edit(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        return view('pedidos.edit',[
            'pedido' => $pedido,
        ]);
    }

    public function update(PedidoRequest $request, Pedido $pedido)
    {

        $this->authorize('owner',$pedido);
        $validated = $request->validated();
        $pedido->update($validated);
        Storage::delete($pedido->path);
        request()->session()->flash('alert-info','atualizado com sucesso');
        return redirect("/pedidos/{$pedido->id}");
    }

    public function destroy(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);

        # o aluno só pode deletar enquanto estiver em elaboração
        if($pedido->status != 'Em elaboração' & !Gate::allows('admin')){
            request()->session()->flash('alert-danger','Esse pedido não pode ser deletado 
                porque não está mais em elaboração');
            return redirect('/meus_pedidos');
        }
        
        Storage::delete($pedido->path);
        foreach($pedido->disciplinas as $disciplina){
            Storage::delete($disciplina->path);
            $disciplina->delete();
        }
        $pedido->delete();
        return redirect('/');
    }

    public function meus_pedidos(){
        $this->authorize('grad');
        $pedidos = Pedido::where('user_id',auth()->user()->id)->paginate(10);
        return view('pedidos.meus_pedidos',[
            'pedidos' => $pedidos
        ]);
    }

    public function showfile(Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        return Storage::download($pedido->path, $pedido->original_name);
    }
}