@extends('layouts.master')
@section('title', 'API - ViaCEP')

@section('content')
    <div class="content">
        <nav class="navbar bg-white">
            <div class="float-left" style="margin-left: 5%;">
                <label style="margin:0px;">Endereços</label><br>
                <small class=" float-left">Listagem</small>
            </div>


            @if ($errors->all())
                <div class="alert @if ($errors->all())alert-danger @endif float-right" role="alert">

                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </div>
            @endif

            @isset($mensagem)
                <div class="alert alert-success float-right" role="alert">
                    <li id="mensagem">{{ $mensagem }}</li>
                </div>
            @endisset

        </nav>

        <div class="row">
            <div class="container">
                <div class="card" style="top:15%;">
                    <div class="row" style="margin-bottom: 25px;">
                        <div class="col col-lg-2">
                            <form id="formRegisterEndereco" method="POST" action="{{ route('create.endereco') }}">
                                @csrf
                                <div class="form-check">
                                    <label class="form-check-label" for="viacep_manual">
                                        Via CEP
                                    </label>
                                    <input class="form-check-input" type="radio" onclick="hideCidadeRua();"
                                        name="viacep_manual" id="viacep_manual1" value="1">
                                </div>
                        </div>
                        <div class="col col-lg-2">
                            <div class="form-check">
                                <label class="form-check-label" for="viacep_manual">
                                    Manual
                                </label>
                                <input class="form-check-input" type="radio" onclick="hideCidadeRua();" name="viacep_manual"
                                    id="viacep_manual2" value="2" checked>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text"
                                    class="form-control cep @error('cep')
                                    is-invalid
                                    @enderror"
                                    name="cep" id="cep" aria-describedby="cepHelp" placeholder="Insira o CEP">
                                @error('cep')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" id="fg-cidade">
                                <label for="cidade">Cidade</label>
                                <input type="text"
                                    class="form-control @error('cidade')
                                    is-invalid
                                    @enderror"
                                    name="cidade" id="cidade" aria-describedby="cidadeHelp" placeholder="Insira a Cidade">
                                @error('cidade')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group" id="fg-rua">
                                <label for="rua">Rua</label>
                                <input type="text"
                                    class="form-control @error('rua')
                                    is-invalid
                                    @enderror"
                                    name="rua" id="rua" aria-describedby="ruaHelp" placeholder="Insira a Rua" />
                                @error('rua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col col-lg-2 align-items-center">
                            <button type="submit" class="btn btn-success float-right center"
                                style="margin-top: 32px;">Cadastrar</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 25px;">
        <div class="container">
            <div class="card" style="top:5%;">
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
    <script>
        $('body').on('click', 'button.excluir', function() {
            var id = $(this).data('id');
            $("#idDelete").val(id);
            $("#modalAlertDelete").modal('toggle');
        });

        $("#formExcluir").on('submit', function(e) {
            e.preventDefault();
            var rota = $('#rotaDelete').val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: rota,
                data: $(this).serialize(),
                processData: false,
                dataType: 'json',
                success: function(data_decoded) {
                    $('#formExcluir')[0].reset();
                    $('#modalAlertDelete').hide();
                    alerta('Endereço excluído com êxito!');
                }
            });
        });
    </script>
@endpush
