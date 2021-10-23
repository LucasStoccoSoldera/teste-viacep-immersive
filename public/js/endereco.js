function hideCidadeRua() {
    if ($("#viacep_manual1").prop("checked")) {
        $('#fg-cidade').hide();
        $('#fg-rua').hide();
        $('#cidade').attr('disabled', 'true');
        $('#rua').attr('disabled', 'true');
    } else {
        $('#fg-cidade').show();
        $('#fg-rua').show();
        $('#cidade').removeAttr('disabled');
        $('#rua').removeAttr('disabled');
    }
}

function alerta(texto) {
    $mensagem = texto;
    $('#mensagem').val(texto);
}

$(document).on('click', '[data-dismiss="modal"]',
    function () {
        table_endereco.ajax.reload(null, false);
    }
);

var table_endereco = $('#tb_endereco').DataTable({
    paging: true,
    ordering: true,
    searching: false,
    processing: true,
    serverside: true,
    ajax: "/list_endereco/",
    columns: [{
            data: "id"
        },
        {
            data: "end_cidade"
        },
        {
            data: "end_rua"
        },
        {
            data: "action",
            className: "text-right"
        },
    ]
});
