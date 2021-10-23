<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Endereco;
use Symfony\Component\HttpFoundation\Request;
use Yajra\DataTables\Facades\DataTables;

class EnderecoController extends Controller
{
    protected function create(EnderecoRequest $enderecoRequest)
    {
        $Endereco = new Endereco();
        $Endereco->id = preg_replace("/[^0-9]/", "", $enderecoRequest->cep);

        if (isset($enderecoRequest->cidade) && isset($enderecoRequest->rua)) {
            $Endereco->end_cidade = $enderecoRequest->cidade;
            $Endereco->end_rua = $enderecoRequest->rua;
        } else {
            $viacep = "https://viacep.com.br/ws/{$enderecoRequest->cep}/json/";
            $response = json_decode(file_get_contents($viacep));

            $Endereco->end_cidade = $response->localidade;
            $Endereco->end_rua = $response->logradouro;
        }

        $Endereco->save();

        return view('api')->with(['mensagem' => 'Cadastro realizado com sucesso!']);

    }

    function list() {
        $data = Endereco::query();

        return DataTables::eloquent($data)
            ->addColumn('action', function ($data) {

                $btn = '<button type="button" class="btn btn-success float-right center excluir" id="excluir' . $data->id . '"
          name="excluir' . $data->id . '"
          data-id="' . $data->id . '" style="padding: .375rem 2.2rem !important;">
           Excluir</button>';

                return $btn;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    public function delete(Request $request)
    {
        $data = Endereco::find($request->id);
        $data->delete();
        return view('init')->with('mensagem', 'Exclusão realizada com sucesso');

    }
}
