// Mascáras INPUT - https://github.com/RobinHerbots/Inputmask
$(document).ready(function () {
    $("#txtIdentificacao").inputmask("999.999.999-99"); // Máscara para o campo de username utilizar o CPF
    $("#txtTelefone").inputmask("(99)9999[9]-9999"); // Aqui um exemplo para validação de telefone para campo de perfil.
});

var tableUsuario;

document.addEventListener('DOMContentLoaded', function () {
    // Carregar datatable
    tableUsuario = $('#tabelaUsuario').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "scrollY": true,
        "scrollX": false, // Desativar scrool horizontal
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
        },
        "ajax": {
            "url": " " + base_url + "/Usuario/GetUsuarios",
            "dataSrc": ""
        },
        "columns": [
            { "data": "id", "width": "0%" },
            { "data": "nome", "width": "15%" },
            { "data": "sobrenome", "width": "20%" },
            { "data": "email", "width": "30%" },
            { "data": "cNome", "width": "15%" },
            { "data": "status", "width": "10%" },
            { "data": "opcao", "width": "10%" }
        ],
        "columnDefs": [
            { "visible": false, "targets": 0 } // Desativar coluna de índice 0 (id)
        ],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[1, "asc"]]
    });

    // Inserir novo Usuário
    var formUsuario = document.querySelector("#formUsuario");
    formUsuario.onsubmit = function (e) {
        e.preventDefault();

        var strIdentificacao = document.querySelector("#txtIdentificacao").value;
        var strNome = document.querySelector("#txtNome").value;
        var strSobrenome = document.querySelector("#txtSobrenome").value;
        var strTelefone = document.querySelector("#txtTelefone").value;
        var strEmail = document.querySelector("#txtEmail").value;
        var intCargo = document.querySelector("#listCargo").value;
        var intStatus = document.querySelector("#listStatus").value;
        var strSenha = document.querySelector("#txtSenha").value;
        var strConfirmacaoSenha = document.querySelector("#txtConfirmacaoSenha").value;

        if (strIdentificacao == '') {
            document.getElementById("txtIdentificacao").classList.add("is-invalid");
        } else {
            document.getElementById("txtIdentificacao").classList.remove("is-invalid");
        }
        if (strNome == '') {
            document.getElementById("txtNome").classList.add("is-invalid");
        } else {
            document.getElementById("txtNome").classList.remove("is-invalid");
        }
        if (strSobrenome == '') {
            document.getElementById("txtSobrenome").classList.add("is-invalid");
        } else {
            document.getElementById("txtSobrenome").classList.remove("is-invalid");
        }
        if (strTelefone == '') {
            document.getElementById("txtTelefone").classList.add("is-invalid");
        } else {
            document.getElementById("txtTelefone").classList.remove("is-invalid");
        }
        if (strEmail == '') {
            document.getElementById("txtEmail").classList.add("is-invalid");
        } else {
            document.getElementById("txtEmail").classList.remove("is-invalid");
        }
        if (intCargo == 0) {
            document.getElementById("listCargo").classList.add("is-invalid");
        } else {
            document.getElementById("listCargo").classList.remove("is-invalid");
        }
        if (intStatus == 0) {
            document.getElementById("listStatus").classList.add("is-invalid");
        } else {
            document.getElementById("listStatus").classList.remove("is-invalid");
        }
        if (strSenha == '') {
            document.getElementById("txtSenha").classList.add("is-invalid");
        } else {
            document.getElementById("txtSenha").classList.remove("is-invalid");
        }
        if (strConfirmacaoSenha == '') {
            document.getElementById("txtConfirmacaoSenha").classList.add("is-invalid");
        } else {
            document.getElementById("txtConfirmacaoSenha").classList.remove("is-invalid");
        }
        if (strIdentificacao = '' || strNome == '' || strSobrenome == '' || strTelefone == '' || strEmail == '' || intCargo == 0 || intStatus == 0 || strSenha == '' || strConfirmacaoSenha == '') {
            swal("Atenção", "Todos os campos são obrigatórios!", "error");
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + '/Usuario/SetUsuario';
        var formData = new FormData(formUsuario);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    $('#modalFormUsuario').modal("hide");
                    Cancelar();
                    swal("Usuário", objData.msg, "success");
                    tableUsuario.api().ajax.reload(function () { });
                } else {
                    $('#txtIdentificacao').select();
                    swal("Erro", objData.msg, "error");
                }
            }
        }
    }
}, false);

function VerUsuario(id) {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Usuario/GetUsuario/' + id;
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objData = JSON.parse(request.responseText);

            if (objData.status) {
                var status = objData.data.status == 1 ? '<span class="badge badge-success">Activo</span>' : '<span class="badge badge-danger">Inactivo</span>';

                document.querySelector("#celIdentificacion").innerHTML = objData.data.identificacao;
                document.querySelector("#celNombre").innerHTML = objData.data.nome;
                document.querySelector("#celApellido").innerHTML = objData.data.sobrenome;
                document.querySelector("#celTelefono").innerHTML = objData.data.telefone;
                document.querySelector("#celEmail").innerHTML = objData.data.email;
                document.querySelector("#celTipoUsuario").innerHTML = objData.data.cNome;
                document.querySelector("#celEstado").innerHTML = status;
                document.querySelector("#celFechaRegistro").innerHTML = objData.data.dataCadastro;
                $('#modalViewUser').modal('show');
            } else {
                swal("Error", objData.msg, "error");
            }
        }
    }

    $("#modalviewUser").modal("show");
}

function OpenModal() {
    document.querySelector('#idUsuario').value = "";
    document.querySelector('#titleModal').innerHTML = "Criar Usuário";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "<u>S</u>alvar";
    document.querySelector("#btnActionForm").setAttribute("accesskey", "s");

    var strSenha = document.querySelector("#validaSenha").style.display = "none";
    document.querySelector("#btnActionForm").disabled = false;

    document.querySelector("#formUsuario").reset();
    $("#modalFormUsuario").modal("show");
    $('#txtIdentificacao').select();
}

window.addEventListener('load', function () {
    CarregarCargosUsuario();
}, false);

function CarregarCargosUsuario() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/Cargo/GetSelectCargos';
    request.open("GET", ajaxUrl, true);  // Abrir requisição ao servidor
    request.send(); // Enviar requisição ao servidor
    request.onreadystatechange = function () { // Obter o reseultado da requisição AJAX
        if (request.readyState == 4 && request.status == 200) {
            document.querySelector('#listCargo').innerHTML += request.responseText;
            // document.querySelector('#listCargo').value += 0;
            // $('#listCargo').selectpicker('render');
            // $('#listCargo').selectpicker('refresh');
        }
    }
}

function Cancelar() {
    document.getElementById("txtIdentificacao").classList.remove("is-invalid");
    document.getElementById("txtNome").classList.remove("is-invalid");
    document.getElementById("txtSobrenome").classList.remove("is-invalid");
    document.getElementById("txtTelefone").classList.remove("is-invalid");
    document.getElementById("txtEmail").classList.remove("is-invalid");
    document.getElementById("listCargo").classList.remove("is-invalid");
    document.getElementById("listStatus").classList.remove("is-invalid");
    document.getElementById("txtSenha").classList.remove("is-invalid");
    document.getElementById("txtConfirmacaoSenha").classList.remove("is-invalid");
    document.querySelector("#formUsuario").reset();
}

function MostrarSenha() {
    var tipo = document.querySelector("#txtConfirmacaoSenha").type;
    if (tipo == "text") {
        $("#txtSenha").attr("type", "password");
        $("#txtConfirmacaoSenha").attr("type", "password");
    } else {
        $("#txtSenha").attr("type", "text");
        $("#txtConfirmacaoSenha").attr("type", "text");
    }
}

function ValidaSenha() {
    var strSenha = document.querySelector("#txtSenha").value;
    var strConfirmacaoSenha = document.querySelector("#txtConfirmacaoSenha").value;
    if (strSenha != strConfirmacaoSenha) {
        var strSenha = document.querySelector("#validaSenha").style.display = "";
        document.querySelector("#btnActionForm").disabled = true;
    }
    else {
        var strSenha = document.querySelector("#validaSenha").style.display = "none";
        document.querySelector("#btnActionForm").disabled = false;
    }
    AlterarCSS();
}

function AlterarCSS() {
    if (document.querySelector('#txtIdentificacao').value != "") {
        document.getElementById("txtIdentificacao").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtNome').value != "") {
        document.getElementById("txtNome").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtSobrenome').value != "") {
        document.getElementById("txtSobrenome").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtTelefone').value != "") {
        document.getElementById("txtTelefone").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtEmail').value != "") {
        document.getElementById("txtEmail").classList.remove("is-invalid");
    }
    if (document.querySelector('#listCargo').value != 0) {
        document.getElementById("listCargo").classList.remove("is-invalid");
    }
    if (document.querySelector('#listStatus').value != 0) {
        document.getElementById("listStatus").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtSenha').value != "") {
        document.getElementById("txtSenha").classList.remove("is-invalid");
    }
    if (document.querySelector('#txtConfirmacaoSenha').value != "") {
        document.getElementById("txtConfirmacaoSenha").classList.remove("is-invalid");
    }
}