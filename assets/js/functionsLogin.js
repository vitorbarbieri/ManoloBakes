// Login Page Flipbox control
$('.login-content [data-toggle="flip"]').click(function () {
    $('.login-box').toggleClass('flipped');
    return false;
});

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

            var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Login/LoginUser';
            var formData = new FormData(formLogin);
            request.open("POST", ajaxUrl, true);
            request.send(formData);
            console.log(request);
            // request.onreadystatechange = function () {
            //     if (request.readyState == 4 && request.status == 200) {
                    // var objData = JSON.parse(request.responseText);
                    // if (objData.status) {
                    //     $('#modalFormUsuario').modal("hide");
                    //     Cancelar();
                    //     swal("Usuário", objData.msg, "success");
                    //     tableUsuario.api().ajax.reload(function () { });
                    // } else {
                    //     $('#txtIdentificacao').select();
                    //     swal("Erro", objData.msg, "error");
                    // }
                // }
            // }
        }
    }
}, false);