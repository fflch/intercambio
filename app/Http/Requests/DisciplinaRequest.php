<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisciplinaRequest extends FormRequest
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
        $data = [
            'tipo' => 'required',
            'nome' => 'required',
            'nota' => 'required|integer',
            'creditos' => 'required|integer',
            'carga_horaria' => 'required|integer',
            'pedido_id' => 'required',
            
        ];

        if($this->tipo == "Obrigatória"){
            $obg = [
            'codigo' => 'required',
            'file'     => 'required|mimes:pdf|max:10000',
        ];
            $data = array_merge($data,$obg);
        } else{
            $opt= [
            'file' => 'nullable'
        ];
            $data = array_merge($data,$opt);
        }

        return $data;
    }

    public function messages()
    {
        return [
            'tipo.required' => 'Insira algo no campo: Tipo da Disciplina',
            'nome.required' => 'Insira algo no campo: Nome da Disciplina',
            'nota.required' => 'Insira algo no campo: Nota',
            'nota.integer' => 'Campo nota deve ser apenas números',
            'creditos.required' => 'Insira algo no campo: Créditos',
            'creditos.integer' => 'Campo créditos deve ser apenas números',
            'carga_horaria.required' => 'Insira algo no campo: Carga Horaria',
            'carga_horaria.integer' => 'Campo carga horaria deve ser apenas números',
            'codigo.required' => 'Insira algo no campo: Código USP',
            'file.required' => 'Insira um arquivo na disciplina obrigatória',          
            'file.max' => 'Tamanho do arquivo não suportado',
            'file.mimes' => 'Somente arquivos PDFs são aceitos',
        ];
    }
    
}