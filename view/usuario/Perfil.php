<?= headerAdmin($data); ?>
<?= navAdmin($data); ?>

<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info"><img class="user-img" src="<?= media(); ?>/img/avatar.png">
                    <h4><?= $_SESSION['userData']['nome'] . $_SESSION['userData']['sobrenome'] ?></h4>
                    <p><?= $_SESSION['userData']['nome_cargo'] ?></p>
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Dados Pessoais</a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Dados Fiscais</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media"><a href="#"></a>
                            <div class="content">
                                <h5>
                                    DADOS PESSOAIS
                                    <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();">
                                        <i class="fa-solid fa-pencil"></i>
                                    </button>
                                </h5>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width:150px;">Identificação:</td>
                                    <td><?= $_SESSION['userData']['identificacao']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nome:</td>
                                    <td><?= $_SESSION['userData']['nome']; ?></td>
                                </tr>
                                <tr>
                                    <td>Sobrenome:</td>
                                    <td><?= $_SESSION['userData']['sobrenome']; ?></td>
                                </tr>
                                <tr>
                                    <td>Telefone:</td>
                                    <td><?= $_SESSION['userData']['telefone']; ?></td>
                                </tr>
                                <tr>
                                    <td>E-mail (Usuario):</td>
                                    <td><?= $_SESSION['userData']['email']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">Dados Fiscais</h4>
                        <form id="formDataFiscal" name="formDataFiscal">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label>Identificacao Tributária</label>
                                    <input class="form-control" type="text" id="txtIdentificacao" name="txtIdentificacao" value="<?= $_SESSION['userData']['identificacao']; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label>Nome Fiscal</label>
                                    <input class="form-control" type="text" id="txtNomeFiscal" name="txtNomeFiscal" value="<?= $_SESSION['userData']['nome_fiscal']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <label>Endereço Fiscal</label>
                                    <input class="form-control" type="text" id="txtEnderecoFiscal" name="txtEnderecoFiscal" value="<?= $_SESSION['userData']['endereco_fiscal']; ?>">
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= footerAdmin($data); ?>