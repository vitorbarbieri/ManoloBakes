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

        var intId = document.querySelector("#idFuncao").value;
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
    document.querySelector('#idFuncao').value = "";
    document.querySelector('#titleModal').innerHTML = "Criar Cargo";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "<u>S</u>alvar";
    document.querySelector("#btnActionForm").setAttribute("accesskey", "s");
    $("#modalFormCargo").modal("show");
    $('#txtNome').select();
}

function cancelar() {
    document.getElementById("txtNome").classList.remove("is-invalid");
    document.getElementById("txtDescricao").classList.remove("is-invalid");
    document.getElementById("listStatus").classList.remove("is-invalid");
    document.querySelector("#formCargo").reset();
}

function alterarCSS() {
    if (document.querySelector('#txtNome').value != "") {
        document.getElementById("txtNome").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtDescricao').value != "") {
        document.getElementById("txtDescricao").classList.remove("is-invalid");
    }
    if (document.querySelector('#listStatus').value != 0) {
        document.getElementById("listStatus").classList.remove("is-invalid");
    }
}

function EditarCargo(idCargo) {
    document.querySelector('#titleModal').innerHTML = "Atualizar Cargo";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML = "<u>A</u>tualizar";
    document.querySelector("#btnActionForm").setAttribute("accesskey", "a");

    var id = idCargo;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Cargo/getCargo/' + id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);
            if (objData.status) {
                document.querySelector('#idFuncao').value = objData.data.id;
                document.querySelector('#txtNome').value = objData.data.nome;
                document.querySelector('#txtDescricao').value = objData.data.descricao;

                if (objData.data.status == 1) {
                    var htmlSelect = '<option value="1" selected>Ativo</option><option value="2">Inativo</option>';
                } else {
                    var htmlSelect = '<option value="1">Ativo</option><option value="2" selected>Inativo</option>';
                }
                document.querySelector("#listStatus").innerHTML = htmlSelect;

                $('#modalFormCargo').modal("hide");
                // cancelar();
                // swal("Cargo de Usuário", objData.msg, "success");
                // tableCargos.api().ajax.reload(function () { });
            } else {
                $('#txtNome').select();
                swal("Erro", objData.msg, "error");
            }
        }
    }

    $('#modalFormCargo').modal('show');
}