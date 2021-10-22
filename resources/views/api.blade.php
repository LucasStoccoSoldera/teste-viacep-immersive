@extends('layouts.master')
@section('title', 'API - ViaCEP')

@section('content')
    <div class="content">
        <nav class="navbar bg-white">
            <div class="float-left" style="margin-left: 5%;">
                <label style="margin:0px;">Endereços</label><br>
                <small class=" float-left">Listagem</small>
            </div>
        </nav>

        <div class="row">
            <div class="container">
                <div class="card">
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col col-lg-2">
                            <div class="form-check">
                                <label class="form-check-label" for="viacep_manual1">
                                    Via CEP
                                </label>
                                <input class="form-check-input" type="radio" onclick="hideCidadeRua();" name="viacep_manual" id="viacep_manual1"/>
                            </div>
                        </div>
                        <div class="col col-lg-2">
                            <div class="form-check">
                                <label class="form-check-label" for="viacep_manual2">
                                    Manual
                                </label>
                                <input class="form-check-input" type="radio" onclick="hideCidadeRua();" name="viacep_manual" id="viacep_manual2"
                                    checked/>
                            </div>
                        </div>
                    </div>
                    <form id="formRegisterEndereco" method="POST" action="{{ route('create.endereco') }}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cep">CEP</label>
                                    <input type="text" class="form-control cep" id="cep" aria-describedby="cepHelp"
                                        placeholder="Insira o CEP">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group" id="fg-cidade">
                                    <label for="cidade">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" aria-describedby="cidadeHelp"
                                        placeholder="Insira a Cidade">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group"id="fg-rua">
                                    <label for="rua">Rua</label>
                                    <input type="text" class="form-control" id="rua" aria-describedby="ruaHelp"
                                        placeholder="Insira a Rua">
                                </div>
                            </div>
                            <div class="col col-lg-2 align-items-center">
                                <button type="submit" class="btn btn-success float-right center"
                                    style="margin-top: 32px">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <div class="container">
            <div class="card">
                <div class="table-responsive">
                    <table class="table tablesorter " id="tb_endereco">
                        <thead>
                            <tr>
                                <th>
                                    CEP
                                </th>
                                <th>
                                    Cidade
                                </th>
                                <th>
                                    Rua
                                </th>
                                <th class="text-right">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('js')
<script src="../js/endereco.js"></script>
@endpush
