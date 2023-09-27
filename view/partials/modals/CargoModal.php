<!-- Modal -->
<div class="modal fade" id="modalFormCargo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Novo Cargo</h5>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formCargo" name="formCargo">
                            <input type="hidden" id="idCargo" name="idCargo">
                            <div class="form-group">
                                <label class="cor-azul">*</label>&nbsp;<label class="control-label">Campo obrigatório</label>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="txtNome">Nome</label>&nbsp;<label class="cor-azul">*</label>
                                <input class="form-control" id="txtNome" name="txtNome" tabindex="1" type="text" placeholder="Nome do Cargo" onBlur="alterarCSS();" autofocus>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="txtDescricao">Descrição</label>&nbsp;<label class="cor-azul">*</label>
                                <textarea class="form-control" id="txtDescricao" name="txtDescricao" tabindex="2" rows="2" placeholder="Descrição do Cargo" onBlur="alterarCSS();"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="listStatus">Status</label>&nbsp;<label class="cor-azul">*</label>
                                <select class="form-control" id="listStatus" name="listStatus" tabindex="3" onchange="alterarCSS();">
                                    <option value="0">-- Selecionar --</option>
                                    <option value="1">Ativo</option>
                                    <option value="2">Inativo</option>
                                </select>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" id="btnActionForm" type="submit" tabindex="4" accesskey="s">
                                    <i class="fa-solid fa-circle-check"></i>&nbsp;
                                    <span id="btnText"><u>S</u>alvar</span>
                                </button>
                                &nbsp;&nbsp;&nbsp;
                                <a class="btn btn-danger" href="#" tabindex="5" accesskey="c" data-dismiss="modal" onclick="cancelar();">
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