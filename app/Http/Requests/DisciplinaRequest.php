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
        }
        return $data;
    }

    public function messages()
    {
        return [
            'tipo' => 'Insira algo no campo: Tipo da Disciplina',
            'nome' => 'Insira algo no campo: Nome da Disciplina',
            'nota' => 'Insira algo no campo: Nota',
            'creditos' => 'Insira algo no campo: Créditos',
            'carga_horaria' => 'Insira algo no campo: Carga Horaria',
            'codigo' => 'Insira algo no campo: Código USP',
            'file' => 'Insira algo no campo: Arquivo da Disciplina obrigatória',          

        ];
    }
    
}