function  hideCidadeRua(){
    if ($("#viacep_manual1").prop("checked")) {
        $('#fg-cidade').hide();
        $('#fg-rua').hide();
        $('#cidade').attr('disabled','true');
        $('#rua').attr('disabled', 'true');
    } else {
        $('#fg-cidade').show();
        $('#fg-rua').show();
        $('#cidade').removeAttr('disabled');
        $('#rua').removeAttr('disabled');
    }
}

var table_endereco = $('#tb_endereco').DataTable({
    paging: true,
    ordering: true,
    searching: false,
    processing: true,
    serverside: true,
    ajax: "{{ route('list.endereco') }}",
    columns: [{
            data: "end_cep"
        },
        {
            data: "end_cidade"
        },
        {
            data: "end_rua"
        },
        {
            data: "action"
        },
    ]
});
