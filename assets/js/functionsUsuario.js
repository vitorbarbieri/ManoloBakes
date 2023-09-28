function OpenModal()
{
    document.querySelector('#idUsuario').value = "";
    document.querySelector('#titleModal').innerHTML = "Criar Usuário";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "<u>S</u>alvar";
    document.querySelector("#btnActionForm").setAttribute("accesskey", "s");
    document.querySelector("#formUsuario").reset();
    $("#modalFormUsuario").modal("show");
    $('#txtIdentificacao').select();
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