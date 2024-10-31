<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Country;
use App\Models\Relatorio;
use App\Models\Instituicao;
use App\Http\Requests\PedidoRequest;
use App\Http\Requests\RelatorioRequest;
use Uspdev\Replicado\Graduacao;
use Fflch\LaravelFflchStepper\Stepper;
use Uspdev\Replicado\Pessoa;
use App\Service\Utils;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Service\GeneralSettings;
use PDF;


class RelatorioController extends Controller
{

    public function create(Pedido $pedido)
    {
        Gate::authorize('grad');
        return view('relatorio.create',[
            'relatorio' => new Relatorio,
            'pedido' => $pedido
        ]);
    }

    public function store(RelatorioRequest $request, Pedido $pedido){
        Gate::authorize('grad');

        if (empty(Graduacao::curso(auth()->user()->codpes, env('REPLICADO_CODUNDCLG')))){
            return back()->with('alert-danger','Esta operação só pode ser executada por um aluno matrículado.');
        }

        $relatorio = Relatorio::create(
            $request->validated() +
            ['user_id' => auth()->user()->id, 'pedido_id' => $pedido->id]
        );

        request()->session()->flash('alert-info', 'Relatório cadastrado com sucesso.');
        return redirect("/pedidos/{$pedido->id}");

    }

    public function index(){
        Gate::authorize('admin');

        $relatorios = Relatorio::paginate(10);

        return view('relatorio.index', compact('relatorios'));
    }

    public function showAdmin(int $id){
        Gate::authorize('admin');

        $relatorio = Relatorio::with('pedido.instituicao.country')->findOrFail($id);

        $pdf = PDF::loadView('relatorio.show', compact('relatorio'));

        return $pdf->download("relatorio_{$relatorio->id}.pdf");
    }

    public function showPublico(int $id) {
        $relatorio = Relatorio::with('pedido.instituicao.country')
            ->whereIn('autorizacao', ['simnomecontato', 'simnome', 'sim'])
            ->where('aprovacao', true)
            ->findOrFail($id);

        $pdf = PDF::loadView('relatorio.show', compact('relatorio'));

        return $pdf->download("relatorio_{$relatorio->id}.pdf");
    }

    public function aprovar(int $id) {
        Gate::authorize('admin');;

        $relatorio = Relatorio::find($id);
        if ($relatorio) {
            $relatorio->aprovacao = !$relatorio->aprovacao;
            $relatorio->save();

            return response()->json(['success' => true, 'aprovacao' => $relatorio->aprovacao]);
        }
    }

    public function aprovados() {
        $relatorios = Relatorio::whereIn('autorizacao', ['simnomecontato', 'simnome', 'sim'])
            ->where('aprovacao', true)
            ->paginate(10);

        return view('relatorio.aprovados', compact('relatorios'));
    }

}
