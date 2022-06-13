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
            'file.max' => 'Tamanho do arquivo não suportad.',
            'file.required' => 'Insira um arquivo.'
        ];
    }
}
