<!-- Modal Criar/Editar Usuário -->
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
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label">Status</label>&nbsp;
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
                                    <input class="form-control" id="txtSenha" name="txtSenha" tabindex="8" type="password" placeholder="Digite sua Senha" onBlur="AlterarCSS();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="control-label" for="txtConfirmacaoSenha">Confirmação Senha</label>&nbsp;
                                    <label class="cor-azul">*</label>
                                    <div style="display: flex; align-items: center;">
                                        <input class="form-control" id="txtConfirmacaoSenha" name="txtConfirmacaoSenha" tabindex="9" type="password" placeholder="Digite sua Confirmação Senha" onBlur="ValidaSenha();">
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

<!-- Modal Ver Usuário -->
<div class="modal fade" id="modalviewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Dados Usuário</h5>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td width="40%">CPF:</td>
                                    <td id="celIdentificacion"></td>
                                </tr>
                                <tr>
                                    <td>Nome:</td>
                                    <td id="celNombre"></td>
                                </tr>
                                <tr>
                                    <td>Sobrenome:</td>
                                    <td id="celApellido"></td>
                                </tr>
                                <tr>
                                    <td>Telefone:</td>
                                    <td id="celTelefono"></td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td id="celEmail"></td>
                                </tr>
                                <tr>
                                    <td>Cargo:</td>
                                    <td id="celTipoUsuario"></td>
                                </tr>
                                <tr>
                                    <td>Status:</td>
                                    <td id="celEstado"></td>
                                </tr>
                                <tr>
                                    <td>Data de Cadastro:</td>
                                    <td id="celFechaRegistro"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-secondary" tabindex="1" accesskey="c" data-dismiss="modal">
                            <span id="btnText">Fe<u>c</u>har</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>