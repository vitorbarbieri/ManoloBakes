var tableCargos;

document.addEventListener('DOMContentLoaded', function () {
    tableCargos = $('#tabelaCargo').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "scrollY": true,
        "scrollX": false, // Desativar scrool horizontal
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        },
        "ajax": {
            "url": " " + base_url + "/Cargo/getCargos",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id", "width": "0%" },
            { "data": "nome", "width": "15%" },
            { "data": "descricao", "width": "60%" },
            { "data": "status", "width": "10%" },
            { "data": "opcao", "width": "15%" }
        ],
        "columnDefs": [
            { "visible": false, "targets": 0 } // Desativar coluna de índice 0 (id)
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[1, "asc"]]
    });

    // Novo Cargo
    var formCargo = document.querySelector("#formCargo");
    formCargo.onsubmit = function (e) {
        e.preventDefault();

        var strNome = document.querySelector('#txtNome').value;
        var strDescricao = document.querySelector('#txtDescricao').value;
        var intStatus = document.querySelector('#listStatus').value;

        if (strNome == '') {
            document.getElementById("txtNome").classList.add("is-invalid");
        } else {
            document.getElementById("txtNome").classList.remove("is-invalid");
        }
        if (strDescricao == '') {
            document.getElementById("txtDescricao").classList.add("is-invalid");
        } else {
            document.getElementById("txtDescricao").classList.remove("is-invalid");
        }
        if (intStatus == 0) {
            document.getElementById("listStatus").classList.add("is-invalid");
        } else {
            document.getElementById("listStatus").classList.remove("is-invalid");
        }
        if (strNome == '' || strDescricao == '' || intStatus == 0) {
            swal("Atenção", "Todos os campos são obrigatórios!", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Cargo/setCargo';
        var formData = new FormData(formCargo);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormCargo').modal("hide");
                    cancelar();
                    swal("Cargo de Usuário", objData.msg, "success");
                    tableCargos.api().ajax.reload(function () { });
                } else {
                    $('#txtNome').select();
                    swal("Erro", objData.msg, "error");
                }
            }
        }
    }
});

$('#tabelaCargo').DataTable();

function openModal() {
    $("#modalFormCargo").modal("show");
    $('#txtNome').select();
}

function cancelar() {
    document.getElementById("txtNome").classList.remove("is-invalid");
    document.getElementById("txtDescricao").classList.remove("is-invalid");
    document.getElementById("listStatus").classList.remove("is-invalid");
    document.querySelector("#formCargo").reset();
}