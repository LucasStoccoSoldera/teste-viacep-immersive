<?php

namespace App\Http\Controllers;

use App\Models\Endereco;

class APIController extends Controller
{
    // Controller de regras de funcionamento API.
    // JSON_UNESCAPED_UNICODE formata a mensagem para linguagem não unicode.
    public function processCEP($cep)
    {
        $cep = preg_replace("/[^0-9]/", "", $cep);

        $registro_banco = Endereco::find($cep);
        if (isset($registro_banco)) {
            return response()->json([
                'cep' => $registro_banco->id,
                'cidade' => $registro_banco->end_cidade,
                'rua' => $registro_banco->end_rua
            ], 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }
        else
        {
            $viacep = "https://viacep.com.br/ws/{$cep}/json/";
            $response = json_decode(file_get_contents($viacep));

            if (isset($response->erro)) {
                return response()->json(['mensagem' => 'CEP Inexistente', 'status' => 'error'], 404);
            }
            else{
                $Endereco = new Endereco();
                $Endereco->id = $cep;
                $Endereco->end_cidade = $response->localidade;
                $Endereco->end_rua = $response->logradouro;
                $Endereco->save();

                return response()->json([
                    'cep' => $response->cep,
                    'cidade' => $response->localidade,
                    'rua' => $response->logradouro
                ], 200,['Content-Type' => 'application/json;charset=UTF-8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
            }
        }
    }
}
