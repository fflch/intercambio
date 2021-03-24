<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscenteRequest extends FormRequest
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
        'Instituicao' => 'required',
        'NomeDisciplina'=> 'required',
        'Nota'=> 'required',
        'Credito' => 'required',
        'CargaHoraria' => 'required',
        'Codigo' => 'required',
        'NomeUsp' => 'required',
        ];
    }
}
