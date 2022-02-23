<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Country;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use App\Http\Requests\PedidoRequest;
use Uspdev\Replicado\Graduacao;
use Fflch\LaravelFflchStepper\Stepper;
use App\Service\Utils;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PedidoController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');
        $pedidos = Pedido::orderBy('id', 'DESC');
        if(isset($request->buscastatus)) {
            $pedidos =  $pedidos->where('status',$request->buscastatus)
                                ->orderBy('id', 'DESC');
        }

        if(isset($request->search)) {
            $pedidos =  $pedidos->where('codpes','LIKE',"%{$request->search}%")
                                ->orWhere('nome','LIKE',"%{$request->search}%")
                                ->orderBy('id', 'DESC');
        }

        return view ('pedidos.index',[
            'pedidos' => $pedidos->paginate(10),
        ]);
    }


    public function create(Country $country)
    {
        $this->authorize('grad');
        $countries = Country::all()->sortBy('nome');

        return view('pedidos.create',[
        'pedido' => new Pedido,
        'countries' => $countries,
        'instituicoes' => array(),
        ]);
    }

    public function getinstituicao(Request $request)
    {
        if($request->has('search')) {
            $instituicoes = Instituicao::where('country_id', $request->search)
                      ->orderby('nome_instituicao','asc')->get();
        }
        $response = array();
        foreach($instituicoes as $insti){
            $response[] = array(
                "id" => $insti->id,
                "nome_instituicao" => $insti->nome_instituicao,
            );
        }
        return response()->json($response);
    }


    public function store(PedidoRequest $request)
    {
        $this->authorize('grad');
        //dd($request);
        $validated = $request->validated();
        //dd($validated);
        $validated['user_id'] = auth()->user()->id;
        $validated['original_name'] = $request->file('file')->getClientOriginalName();
        $validated['path'] = $request->file('file')->store('.');
        $pedido = Pedido::create($validated);

        request()->session()->flash('alert-info','Pedido cadastrado com sucesso.');
        return redirect("/pedidos/$pedido->id");
    }

    public function show(Pedido $pedido, Stepper $stepper)
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
        $countries = Country::all()->sortBy('nome');
       
        $instituicao = Instituicao::where('id', $pedido['instituicao_id'])->first();
       

        return view('pedidos.edit',[
            'pedido' => $pedido,
            'countries' => $countries,
            'country_id' => $instituicao->country_id,
            'instituicoes' => array(),
        ]);
    }

    public function update(PedidoRequest $request, Pedido $pedido)
    {
        $this->authorize('owner',$pedido);
        $validated = $request->validated();
        if($request->file('file') != null){
            Storage::delete($pedido->path);//deletar só se mandar um novo
            $validated['original_name'] = $request->file('file')->getClientOriginalName();
            $validated['path'] = $request->file('file')->store('.');
        }
        $pedido->update($validated);
        request()->session()->flash('alert-info','Pedido atualizado com sucesso.');
        return redirect("/pedidos/{$pedido->id}");
    }

    public function destroy(Pedido $pedido)
    {
        //desabilitado no form
        $this->authorize('owner',$pedido);

        # o aluno só pode deletar enquanto estiver em elaboração
        if($pedido->status != 'Em elaboração' & !Gate::allows('admin')){
            request()->session()->flash('alert-danger','O Pedido não pode ser excluído
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
