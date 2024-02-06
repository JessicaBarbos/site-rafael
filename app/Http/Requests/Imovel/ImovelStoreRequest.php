<?php

namespace App\Http\Requests\Imovel;

use App\Models\Imovel;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ImovelStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'codigo' => ['required', 'string',  Rule::unique(Imovel::class)],
            'nome' => ['required', 'string', 'max:255'],
            'tipo' => ['required']
        ];
    }
    public function messages()
    {
        return [
            'codigo.required' => 'O campo Código é obrigatório',
            'codigo.unique' => 'Já existe um imóvel com esse código cadastrado',
            'nome.required' => 'O campo Nome é obrigatório',
            'nome.string' => 'O campo Nome é um campo texto',
            'nome.max' => 'O campo Nome pode conter no máximo :max caracteres',
            'tipo.required' => 'O campo tipo é obrigatório'
        ];
    }
}
