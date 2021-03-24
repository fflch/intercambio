<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscenteOptRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nome'=> 'required',
            'nUSP' => 'required',
            'Curso' => 'required',
            'Periodo' => 'required',
            'Instituicao' => 'required',
            'NomeDisciplina'=> 'required',
            'DataInicial'=> 'required',
            'DataFinal'=> 'required',
            'Credito' => 'required',
            'CargaHoraria' => 'required',
            'Modalidade' => 'required',
            ];
    }
}
