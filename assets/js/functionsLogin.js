// Login Page Flipbox control
$('.login-content [data-toggle="flip"]').click(function () {
    $('.login-box').toggleClass('flipped');
    return false;
});

var divLoading = document.querySelector("#divLoading");

document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector("#formLogin")) {
        let formLogin = document.querySelector("#formLogin");
        formLogin.onsubmit = function (e) {
            e.preventDefault();

            let strEmail = document.querySelector("#txtEmail").value;
            let strPassword = document.querySelector("#txtPassword").value;

            if (strEmail == '') {
                document.getElementById("txtEmail").classList.add("is-invalid");
            } else {
                document.getElementById("txtEmail").classList.remove("is-invalid");
            }
            if (strPassword == '') {
                document.getElementById("txtPassword").classList.add("is-invalid");
            } else {
                document.getElementById("txtPassword").classList.remove("is-invalid");
            }

            if (strEmail == "" || strPassword == "") {
                swal("Por favor", "Todos os campos são obrigatório", "error");
                return false;
            }

            divLoading.style.display = "flex";

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Login/LoginUser';
            var formData = new FormData(formLogin);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState != 4) {
                    return
                }

                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        window.location = base_url + "/dashboard";
                    } else {
                        swal("Atenção", objData.msg, "error");
                        document.querySelector("#txtEmail").value = "";
                        document.querySelector("#txtPassword").value = "";
                        $('#txtEmail').select();
                    }
                } else {
                    swal("Atenção", "Erro no processo de login", "error");
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }

    if (document.querySelector("#formRecetPass")) {
        let formRecetPass = document.querySelector("#formRecetPass");
        formRecetPass.onsubmit = function (e) {
            e.preventDefault();

            let strEmail = document.querySelector("#txtEmailReset").value;
            if (strEmail == '') {
                document.getElementById("txtEmail").classList.add("is-invalid");
                swal("Por favor", "O campo e-mail é obrigatório", "error");
                return false;
            } else {
                document.getElementById("txtEmail").classList.remove("is-invalid");
            }
            
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Login/ResetPass';
            var formData = new FormData(formRecetPass);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState != 4) {
                    return
                }

                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "OK",
                            closeOnConfirm: false,
                        }, function (isConfirm) {
                            if (isConfirm) {
                                window.location = base_url;
                            }
                        });
                    } else {
                        swal("Atenção", objData.msg, "error");
                    }
                } else {
                    swal("Atenção", "Erro no processo", "error");
                }
                return false;
            }
        }
    }

    if (document.querySelector("#formTrocarPass")) {
        let formTrocarPass = document.querySelector("#formTrocarPass");
        formTrocarPass.onsubmit = function (e) {
            e.preventDefault();

            let strPassword = document.querySelector("#txtPassword").value;
            let strPasswordConfirm = document.querySelector("#txtPasswordConfirm").value;
            let idUsuario = document.querySelector("#idUsuario").value;

            if (strPassword == "" || strPasswordConfirm == "") {
                swal("Atenção", "Informe a nova senha", "error");
                return false;
            } else {
                if (strPassword.length < 3) {
                    swal("Atenção", "A senha deve conter no mínimo 3 caracteres", "error");
                    return false;
                }
                if (strPassword != strPasswordConfirm) {
                    swal("Atenção", "Senhas informadas são diferentes", "error");
                    return false;
                }
            }

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Login/SetPassword';
            var formData = new FormData(formTrocarPass);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            request.onreadystatechange = function () {
                if (request.readyState != 4) {
                    return
                }

                if (request.status == 200) {
                    var objData = JSON.parse(request.responseText);

                    if (objData.status) {
                        swal({
                            title: "",
                            text: objData.msg,
                            type: "success",
                            confirmButtonText: "Iniciar sessão",
                            closeOnConfirm: false,
                        }, function (isConfirm) {
                            if (isConfirm) {
                                window.location = base_url + "/login";
                            }
                        });
                    } else {
                        swal("Atenção", objData.msg, "error");
                    }
                } else {
                    swal("Atenção", "Erro no processo", "error");
                }
            }
        }
    }
}, false);