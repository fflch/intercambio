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


class RelatorioController extends Controller
{

    public function create(Pedido $pedido)
    {        
        $this->authorize('grad');
        return view('relatorio.create',[
            'relatorio' => new Relatorio,
            'pedido' => $pedido
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

    public function store(RelatorioRequest $request, Pedido $pedido){

        $pedido = Pedido::where('id','=',8)->first();
    
        if (empty(Graduacao::curso(auth()->user()->codpes, env('REPLICADO_CODUNDCLG')))){
        return back()->with('alert-danger','Esta operação só pode ser executada por um aluno matrículado.');
    }
    $this->authorize('grad');

    // Valida e prepara os dados do request
    $validated = $request->validated();
    $validated['user_id'] = auth()->user()->id;

    
    // Criação e preenchimento do objeto Relatorio
    $relatorio = new Relatorio();
    $relatorio->pedido_id = $request->pedido_id;
    $relatorio->autorizacao = $request->autorizacao;
    $relatorio->periodo = $request->periodo;
    $relatorio->pescolhadestino = $request->pescolhadestino;
    $relatorio->pvisto = $request->pvisto;
    $relatorio->questoesbancarias = $request->questoesbancarias;
    $relatorio->segurosaude = $request->has('segurosaude') ? 1 : 0;
    $relatorio->segurosauderec = $request->segurosauderec;
    $relatorio->passagens = $request->has('passagens') ? 1 : 0;
    $relatorio->passagensrec = $request->passagensrec;
    $relatorio->oferecimentomoradia = $request->has('moradia') ? 1 : 0;
    $relatorio->moradia = $request->has('moradia') ? 1 : 0;
    $relatorio->moradiafora = $request->moradiafora;
    $relatorio->moradiaqnt = $request->has('moradiaqnt') ? 1 : 0;
    $relatorio->proximidade = $request->has('proximidade') ? 1 : 0;
    $relatorio->moradiarexp = $request->moradiarexp;
    $relatorio->prepbagagem = $request->prepbagagem;
    $relatorio->conhecimentoprevio = $request->conhecimentoprevio;
    $relatorio->registro = $request->has('registro') ? 1 : 0;
    $relatorio->registroexp = $request->registroexp;
    $relatorio->contabancaria = $request->has('contabancaria') ? 1 : 0;
    $relatorio->contabancariaexp = $request->contabancariaexp;
    $relatorio->chip = $request->has('chip') ? 1 : 0;
    $relatorio->chipexp = $request->chipexp;
    $relatorio->transportepublico = $request->transportepublico;
    $relatorio->descontotransportepublico = $request->has('descontotransportepublico') ? 1 : 0;
    $relatorio->descontotransportepublicoexp = $request->descontotransportepublicoexp;
    $relatorio->orientacao = $request->orientacao;
    $relatorio->orientacaoexp = $request->orientacaoexp;
    $relatorio->cursoidioma = $request->has('cursoidioma') ? 1 : 0;
    $relatorio->cursoidiomagratuidade = $request->has('cursoidiomagratuidade') ? 1 : 0;
    $relatorio->cursoidiomavalor = $request->has('cursoidiomavalor') ? 1 : 0;
    $relatorio->matricula = $request->matricula;
    $relatorio->restauranteuniversitario = $request->has('restauranteuniversitario') ? 1 : 0;
    $relatorio->restauranteuniversitariovalor = $request->restauranteuniversitariovalor;
    $relatorio->restauranteacessivel = $request->has('restauranteacessivel') ? 1 : 0;
    $relatorio->taxaadm = $request->has('taxaadm') ? 1 : 0;
    $relatorio->taxaadmexp = $request->taxaadmexp;
    $relatorio->expacademica = $request->expacademica;
    $relatorio->programaamizade = $request->has('programaamizade') ? 1 : 0;
    $relatorio->programaamizadeexp = $request->programaamizadeexp;
    $relatorio->dificuldadeacompanhamento = $request->has('dificuldadeacompanhamento') ? 1 : 0;
    $relatorio->dificuldadeacompanhamentoexp = $request->dificuldadeacompanhamentoexp;
    $relatorio->dificuldadeidioma = $request->has('dificuldadeidioma') ? 1 : 0;
    $relatorio->dificuldadeidiomaexp = $request->dificuldadeidiomaexp;
    $relatorio->adaptacao = $request->adaptacao;
    $relatorio->dificuldades = $request->dificuldades;
    $relatorio->atvintegracao = $request->has('atvintegracao') ? 1 : 0;
    $relatorio->atvintegracaoexp = $request->atvintegracaoexp;
    $relatorio->bolsa = $request->has('bolsa') ? 1 : 0;
    $relatorio->bolsasuf = $request->bolsasuf;
    $relatorio->gastomensal = $request->gastomensal;
    $relatorio->atvremunerada = $request->has('atvremunerada') ? 1 : 0;
    $relatorio->atvremuneradaexp = $request->atvremuneradaexp;
    $relatorio->dicas = $request->dicas;

    // Salva o Relatorio
    $relatorio->save();

    
    // Mensagem de sucesso e redirecionamento
    request()->session()->flash('alert-info', 'Relatório cadastrado com sucesso.');
    return redirect("/pedidos/{$request->pedido_id}");
    
    }

    public function update(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'autorizacao' => 'required|in:sim,nao',
            'pais_id' => 'required|exists:paises,id',
            'instituicao_id' => 'required|exists:instituicoes,id',
            'periodo' => 'required|string',
            'pescolhadestino' => 'required|string',
            'pvisto' => 'required|string',
            'questoesbancarias' => 'required|string',
            'segurosaude' => 'nullable|boolean',
            'segurosauderec' => 'nullable|string',
            'passagens' => 'nullable|boolean',
            'passagensrec' => 'nullable|string',
            'moradia' => 'nullable|boolean',
            'prepbagagem' => 'required|string',
            'conhecimentoprevio' => 'required|string',
            'registro' => 'nullable|boolean',
            'registroexp' => 'nullable|string',
            'contabancaria' => 'nullable|boolean',
            'contabancariaexp' => 'nullable|string',
            'chip' => 'nullable|boolean',
            'chipexp' => 'nullable|string',
            'moradiafora' => 'nullable|string',
            'moradiaqnt' => 'nullable|boolean',
            'proximidade' => 'nullable|boolean',
            'transportepublico' => 'required|string',
            'descontotransportepublico' => 'nullable|boolean',
            'descontotransportepublicoexp' => 'nullable|string',
            'orientacao' => 'required|string',
            'orientacaoexp' => 'nullable|string',
            'cursoidioma' => 'nullable|boolean',
            'cursoidiomagratuidade' => 'nullable|boolean',
            'cursoidiomavalor' => 'nullable|boolean',
            'matricula' => 'required|string',
            'restauranteuniversitario' => 'nullable|boolean',
            'restauranteuniversitariovalor' => 'nullable|string',
            'taxaadm' => 'nullable|boolean',
            'taxaadmexp' => 'nullable|string',
            'expacademica' => 'required|string',
            'programaamizade' => 'nullable|boolean',
            'programaamizadeexp' => 'nullable|string',
            'dificuldadeacompanhamento' => 'nullable|boolean',
            'dificuldadeacompanhamentoexp' => 'nullable|string',
            'dificuldadeidioma' => 'nullable|boolean',
            'dificuldadeidiomaexp' => 'nullable|string',
            'adaptacao' => 'required|string',
            'dificuldades' => 'required|string',
            'atvintegracao' => 'nullable|boolean',
            'atvintegracaoexp' => 'nullable|string',
            'bolsa' => 'nullable|boolean',
            'bolsaexp' => 'nullable|string',
            'gastomensal' => 'required|string',
            'atvremunerada' => 'nullable|boolean',
            'atvremuneradaexp' => 'nullable|string',
            'dicas' => 'required|string',
        ]);

        // Salvar os dados no banco de dados
        $relatorio = new Relatorio();
        $relatorio->nome = $request->nome;
        $relatorio->email = $request->email;
        $relatorio->autorizacao = $request->autorizacao;
        $relatorio->pais_id = $request->pais_id;
        $relatorio->instituicao_id = $request->instituicao_id;
        $relatorio->periodo = $request->periodo;
        $relatorio->pescolhadestino = $request->pescolhadestino;
        $relatorio->pvisto = $request->pvisto;
        $relatorio->questoesbancarias = $request->questoesbancarias;
        $relatorio->segurosaude = $request->has('segurosaude');
        $relatorio->segurosauderec = $request->segurosauderec;
        $relatorio->passagens = $request->has('passagens');
        $relatorio->passagensrec = $request->passagensrec;
        $relatorio->moradia = $request->has('moradia');
        $relatorio->prepbagagem = $request->prepbagagem;
        $relatorio->conhecimentoprevio = $request->conhecimentoprevio;
        $relatorio->registro = $request->has('registro');
        $relatorio->registroexp = $request;
    }
}
