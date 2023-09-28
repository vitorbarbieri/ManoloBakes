<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Novo Usuário</h5>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formUsuario" name="formUsuario" class="form-horizontal">
                            <input type="hidden" id="idUsuario" name="idUsuario">
                            <div class="form-group">
                                <label class="cor-azul">*</label>&nbsp;
                                <label class="control-label">Campo obrigatório</label>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtIdentificacao">CPF</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtIdentificacao" name="txtIdentificacao" tabindex="1" type="text" placeholder="Digite seu CPF" onBlur="AlterarCSS();" autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtNome">Nome</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtNome" name="txtNome" tabindex="2" type="text" placeholder="Digite seu Nome" onBlur="AlterarCSS();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtSobrenome">Sobrenome</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtSobrenome" name="txtSobrenome" tabindex="3" type="text" placeholder="Digite seu Sobrenome" onBlur="AlterarCSS();">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtTelefone">Telefone</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtTelefone" name="txtTelefone" tabindex="4" type="text" placeholder="Digite seu Telefone" onBlur="AlterarCSS();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtEmail">Email</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtEmail" name="txtEmail" tabindex="5" type="text" placeholder="Digite seu E-mail" onBlur="AlterarCSS();">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label">Cargo</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <select class="form-control" id="listCargo" name="listCargo" tabindex="6" onchange="AlterarCSS();">
                                        <option value="0">-- Selecionar --</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Vendedor</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Email</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <select class="form-control" id="listStatus" name="listStatus" tabindex="7" onchange="AlterarCSS();">
                                        <option value="0">-- Selecionar --</option>
                                        <option value="1">Ativo</option>
                                        <option value="2">Inativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtSenha">Senha</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtSenha" name="txtSenha" tabindex="8" type="text" placeholder="Digite sua Senha" onBlur="AlterarCSS();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtConfirmacaoSenha">Confirmação Senha</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <input class="form-control" id="txtConfirmacaoSenha" name="txtConfirmacaoSenha" tabindex="9" type="text" placeholder="Digite sua Confirmação Senha" onBlur="AlterarCSS();">
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" id="btnActionForm" type="submit" tabindex="10" accesskey="s">
                                    <i class="fa-solid fa-circle-check"></i>&nbsp;
                                    <span id="btnText"><u>S</u>alvar</span>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="#" tabindex="11" accesskey="c" data-dismiss="modal" onclick="Cancelar();">
                                    <i class="fa-solid fa-circle-xmark"></i>&nbsp;
                                    <u>C</u>ancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>