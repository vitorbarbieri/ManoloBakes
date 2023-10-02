<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= media(); ?>/img/favicon.ico" type="image/x-icon">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
    <title><?= $data['page_tag'] ?></title>
</head>

<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1><?= $data['page_title'] ?></h1>
        </div>
        <div class="login-box flipped">
            <form id="formRecetPass" name="formRecetPass" class="forget-form">
                <input type="hidden" id="idUsuario" name="idUsuario" value="<?= $data['id']; ?>">
                <h3 class="login-head">
                    <i class="fa fa-key"></i>
                    Trocar Senha
                </h3>
                <div class="form-group">
                    <input id="txtPassword" name="txtPassword" class="form-control" type="password" placeholder="Nova senha">
                </div>
                <div class="form-group">
                    <input id="txtPasswordConfirm" name="txtPasswordConfirm" class="form-control" type="password" placeholder="Confirmar senha">
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa-solid fa-unlock"></i>&numsp;
                        Reiniciar
                    </button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0">
                        <a href="<?= base_url() ?>/login">
                            <i class="fa-solid fa-angle-left"></i>&numsp;
                            Voltar ara Login
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </section>
    <script>
        const base_url = "<?= base_url(); ?>";
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?= media(); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/popper.min.js"></script>
    <script src="<?= media(); ?>/js/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/fontawesome.js"></script>
    <script src="<?= media(); ?>/js/main.js"></script>
    <!-- Sweet alert -->
    <script type="text/javascript" src="<?= media(); ?>/js/plugins/sweetalert.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= media(); ?>/js/plugins/pace.min.js"></script>

    <script src="<?= media(); ?>/js/<?= $data['page_functions_js'] ?>"></script>
</body>

</html>