<div class="modal fade bd-example-modal-lg modalPermissao" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">Permissões Função de Usuário</h5>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="tile">
                        <form action="" id="formPermissao" name="formPermissao">
                            <input type="hidden" id="idCargo" name="idCargo" value="<?= $data['idCargo']; ?>">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Módulo</th>
                                            <th>Consultar</th>
                                            <th>Atualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $modulos = $data['modulos'];

                                        for ($i = 0; $i < count($modulos); $i++) {
                                            $permissao = $modulos[$i]['permissao'];
                                            $consultarCheck = $permissao['consultar'] == 1 ? "checked" : "";
                                            $altearCheck = $permissao['alterar'] == 1 ? "checked" : "";

                                            $idmod = $modulos[$i]['id'];
                                        ?>
                                            <tr>
                                                <td>
                                                    <?= $no; ?>
                                                    <input type="hidden" name="modulos[<?= $i; ?>][id]" value="<?= $idmod ?>">
                                                </td>
                                                <td>
                                                    <?= $modulos[$i]['nome']; ?>
                                                </td>
                                                <td>
                                                    <div class="toggle-flip">
                                                        <label>
                                                            <input type="checkbox" name="modulos[<?= $i; ?>][consultar]" <?= $consultarCheck; ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="toggle-flip">
                                                        <label>
                                                            <input type="checkbox" name="modulos[<?= $i; ?>][alterar]" <?= $altearCheck; ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa-solid fa-check" aria-hidden="true"></i>&nbsp;
                                    Salvar
                                </button>
                                <button class="btn btn-info" type="submit" data-dismiss="modal">
                                    <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>&nbsp;
                                    Sair
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>