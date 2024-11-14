<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RelatorioSearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'search' => 'nullable|string|max:255',
        ];
    }

    public function filtro()
    {
        $filtro = [];

        if ($this->has('search') && $this->input('search') !== '') {
            $filtro['search'] = $this->input('search');
        }

        return $filtro;
    }
}
