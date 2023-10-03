<!-- Modal Criar/Editar Usuário -->
<div class="modal fade" id="modalFormPerfil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="titleModal">Editar Usuário</h5>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formPerfil" name="formPerfil" class="form-horizontal">
                            <div class="form-group">
                                <label class="cor-azul">*</label>&nbsp;
                                <label class="control-label">Campo obrigatório</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtIdentificacao">CPF</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control valid" id="txtIdentificacao" name="txtIdentificacao" tabindex="1" type="text" placeholder="Digite seu CPF" onBlur="AlterarCSS();" value="<?= $_SESSION['userData']['identificacao']; ?>" autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtNome">Nome</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control valid validText" id="txtNome" name="txtNome" tabindex="2" type="text" placeholder="Digite seu Nome" onBlur="AlterarCSS();" value="<?= $_SESSION['userData']['nome']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtSobrenome">Sobrenome</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control valid validText" id="txtSobrenome" name="txtSobrenome" tabindex="3" type="text" placeholder="Digite seu Sobrenome" onBlur="AlterarCSS();" value="<?= $_SESSION['userData']['sobrenome']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtTelefone">Telefone</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control valid" id="txtTelefone" name="txtTelefone" tabindex="4" type="text" placeholder="Digite seu Telefone" onBlur="AlterarCSS();" value="<?= $_SESSION['userData']['telefone']; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtEmail">Email</label>&nbsp;
                                    <input class="form-control valid validEmail" id="txtEmail" name="txtEmail" tabindex="5" type="text" placeholder="Digite seu E-mail" onBlur="AlterarCSS();" value="<?= $_SESSION['userData']['email']; ?>" readonly disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtSenha">Senha</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control valid" id="txtSenha" name="txtSenha" tabindex="8" type="password" placeholder="Digite sua Senha" onBlur="AlterarCSS();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtConfirmacaoSenha">Confirmação Senha</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <div style="display: flex; align-items: center;">
                                        <input class="form-control valid" id="txtConfirmacaoSenha" name="txtConfirmacaoSenha" tabindex="9" type="password" placeholder="Digite sua Confirmação Senha" onBlur="ValidaSenha();">
                                        &nbsp;
                                        <i class="fa-solid fa-eye imgSenha" onclick="MostrarSenha();"></i>
                                    </div>
                                    <label id="validaSenha" class="cor-azul" style="display: none;">Senhas não conferem</label>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" id="btnActionForm" type="submit" tabindex="10" accesskey="s">
                                    <i class="fa-solid fa-circle-check"></i>&nbsp;
                                    <span id="btnText"><u>S</u>alvar</span>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="#" tabindex="11" accesskey="a" data-dismiss="modal" onclick="Cancelar();">
                                    <i class="fa-solid fa-circle-xmark"></i>&nbsp;
                                    C<u>a</u>ncelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>