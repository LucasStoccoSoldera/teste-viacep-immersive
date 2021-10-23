<?php

namespace App\Http\Requests;

use App\Rules\EnderecoRule;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Request;

class EnderecoRequest extends FormRequest
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

    // Remove os caracteres não alfa-numéricos antes de validar
    public function validationData()
    {
        $data = $this->all();
        $data['cep'] = preg_replace("/[^0-9]/", "", $data['cep']);
        return $data;
    }

    /**
     * Realiza a validação de todos os pontos mencionados no projeto relativo aos forms
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $input = [$request->cep];

        $request->merge(array_map(function ($item) {
            return preg_replace("/[^0-9]/", "", $item);
        }, $input));

        if ($request->viacep_manual == 2) {
            return [
                'cep' => ['required', 'unique:enderecos,id'],
                'cidade' => ['required'],
                'rua' => ['required'],
            ];
        } else if ($request->viacep_manual == 1) {
            return [
                'cep' => ['required', 'unique:enderecos,id', new EnderecoRule],
            ];
        }
    }

    // Retorna as tratativas de erro
    public function messages()
    {
        return [
            'cep.required' => 'CEP obrigatório.',
            'cep.unique' => 'Esse CEP já existe no banco de dados',
            'cidade.required' => 'Cidade obrigatória.',
            'rua.required' => 'Rua obrigatória.',
        ];
    }
}
