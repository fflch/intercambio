<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
        $rules =  [
            'instituicao_id' => 'required',
            'visto_info' => 'required',
            'bancaria_info' => 'required',
            'seguro_info' => 'required',
            'passagem_info' => 'required',
            'moradia_universidade_info' => 'required',
            'bagagem_info' => 'required',
            'preparo_info' => 'required',
            'registro_chegada_info' => 'required',
            'abrir_conta_info' => 'required',
            'chip_info' => 'required',
            'moradia_info' => 'required',
            'transportepublico_info' => 'required',
            'orientacao_info' => 'required',
            'curso_idioma_info' => 'required',
            'matricula_materia_info' => 'required',
            'RU_info' => 'required',
            'taxa_info' => 'required',
            'exp_academica_info' => 'required',
            'usp_ifriend_info' => 'required',
            'dificuldade_aula_info' => 'required',
            'adaptacao_info' => 'required',
            'dificuldade_info' => 'required',
            'integracao_info' => 'required',
            'bolsa_info' => 'required',
            'gasto_medio_info' => 'required',
            'atividade_remunerada_info' => 'required',
            'dica_info' => 'required',
            'autorizacao' => 'required',
        ];

        if ($this->method() == 'PATCH' || $this->method() == 'PUT'){
            $rules['file'] = 'nullable|mimes:pdf|max:15000';
        }
        else{
            $rules['file'] = 'required|mimes:pdf|max:15000';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'instituicao_id.required' => 'O campo Instituição é obrigatório.',
            'file.mimes' => 'Somente arquivos PDFs são aceitos.',
            'file.max' => 'Tamanho do arquivo não suportado.',
            'file.required' => 'Insira um arquivo.'
        ];
    }
}
