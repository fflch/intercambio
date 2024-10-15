<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /**
    * Indicates if the validator should stop on the first rule failure.
    *
    * @var bool
    */
    protected $stopOnFirstFailure = true;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'autorizacao' => 'required|in:simnomecontato,simnome,sim,nao',
            'periodo' => 'required|string',
            'pescolhadestino' => 'required|string',
            'pvisto' => 'required|string',
            'questoesbancarias' => 'required|string',
            'segurosaude' => 'nullable|boolean',
            'segurosauderec' => 'nullable|string',
            'passagens' => 'nullable|boolean',
            'passagensrec' => 'nullable|string',
            'oferecimentomoradia' => 'nullable|boolean',
            'moradia' => 'nullable|boolean',
            'moradiaexp' => 'nullable|string',
            'moradiaqnt' => 'nullable|boolean',
            'proximidade' => 'nullable|boolean',
            'moradiafora' => 'nullable|string',
            'prepbagagem' => 'required|string',
            'conhecimentoprevio' => 'required|string',
            'registro' => 'nullable|boolean',
            'registroexp' => 'nullable|string',
            'contabancaria' => 'nullable|boolean',
            'contabancariaexp' => 'nullable|string',
            'chip' => 'nullable|boolean',
            'chipexp' => 'nullable|string',
            'transportepublico' => 'required|string',
            'descontotransportepublico' => 'nullable|boolean',
            'descontotransportepublicoexp' => 'nullable|string',
            'orientacao' => 'required|string',
            'orientacaoexp' => 'nullable|string',
            'cursoidioma' => 'nullable|boolean',
            'cursoidiomagratuidade' => 'nullable|boolean',
            'cursoidiomavalor' => 'nullable|string',
            'matricula' => 'required|string',
            'aulasantes' => 'nullable|boolean',
            'restauranteuniversitario' => 'nullable|boolean',
            'restauranteuniversitariovalor' => 'nullable|string',
            'restauranteacessivel' => 'nullable|boolean',
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
            'bolsasuf' => 'nullable|boolean',
            'gastomensal' => 'required|string',
            'atvremunerada' => 'nullable|boolean',
            'atvremuneradaexp' => 'nullable|string',
            'dicas' => 'required|string',
        ];
    }

    public function messages(){
        return [
            'required' => 'Todos os campos com asterisco são requeridos',
        ];
    }
}
