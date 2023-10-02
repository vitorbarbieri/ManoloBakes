<?= headerAdmin($data); ?>
<?= navAdmin($data); ?>

<main class="app-content">
    <?php
    getModal("UsuarioModal", $data);
    if (empty($_SESSION['permissoesModulos']['consultar'])) {
    ?>
        <p>Acesso restringido</p>
    <?php
    } else {
    ?>
        <div class="app-title">
            <div>
                <h1>
                    <i class="fa fa-dashboard"></i>&nbsp;
                    <?= $data['page_title'] ?>&numsp;
                    <?php if ($_SESSION['permissoesModulos']['alterar']) { ?>
                        <button class="btn btn-primary" type="button" onclick="OpenModal();">
                            <i class="fa-solid fa-circle-plus"></i>&nbsp;
                            Novo
                        </button>
                    <?php } ?>
                </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item">
                    <i class="fa-solid fa-house"></i>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url() . '/' . $data['page_name']; ?>">
                        <?= $data['page_name']; ?>
                    </a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="tabelaUsuario">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Sobrenome</th>
                                        <th>E-mail</th>
                                        <th>Cargo</th>
                                        <th>Status</th>
                                        <th></th>
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
    <?php
    }
    ?>
</main>

<?= footerAdmin($data); ?>