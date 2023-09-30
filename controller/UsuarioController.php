<?php

class UsuarioController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function usuario()
    {
        $data['page_id'] = 4;
        $data['page_tag'] = "Usuário - Manolo Bakes";
        $data['page_title'] = "Usuário";
        $data['page_name'] = "Usuario";
        $this->views->getView($this, "usuario", $data);
    }

    public function SetUsuario()
    {
        if ($_POST) {
            $intId = intval(strClean($_POST['idUsuario']));
            $strIdentificacao = strClean($_POST['txtIdentificacao']);
            $strNome = ucwords(strClean($_POST['txtNome']));
            $strSobrenome = ucwords(strClean($_POST['txtSobrenome']));
            $strTelefone = strClean($_POST['txtTelefone']);
            $strEmail = strtolower(strClean($_POST['txtEmail']));
            $intCargo = intval(strClean($_POST['listCargo']));
            $intStatus = intval(strClean($_POST['listStatus']));
            $strSenha = strClean($_POST['txtSenha']);
            $dateCadastro = date('Y-m-d H:i:s',);

            if ($intId == 0) {
                $request = $this->model->insertUsuario($strIdentificacao, $strNome, $strSobrenome, $strTelefone, $strEmail, $intCargo, $intStatus, $strSenha, $dateCadastro);
                $option = 1;
            } else {
                $request = $this->model->updateUsuario($intId, $strIdentificacao, $strNome, $strSobrenome, $strTelefone, $strEmail, $intCargo, $intStatus, $strSenha, $dateCadastro);
                $option = 2;
            }

            if ($request || is_numeric($request) && $request > 0) {
                if ($option == 1) {
                    $arrResponse = array('status' => true, 'msg' => 'Informações salvas corretamente');
                } else {
                    $arrResponse = array('status' => true, 'msg' => 'Informações atualizadas corretamente');
                }
            } else {
                if ($request == 'exist') {
                    $arrResponse = array('status' => false, 'msg' => 'Atenção, CPF ja está sendo utilizado');
                } else {
                    $arrResponse = array('status' => false, 'msg' => 'Erro ao salvar as informações');
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function GetUsuarios()
    {
        $arrData = $this->model->selectUsuarios();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success">Ativo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inativo</span>';
            }

            $arrData[$i]['opcao'] = '
                <div class="text-center">
                    <button class="btn btn-secondary btn-sm" onClick="VerUsuario(' . $arrData[$i]['id'] . ')" title="Permissão" type="button">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                    <button class="btn btn-primary btn-sm" onClick="EditarUsuario(' . $arrData[$i]['id'] . ')" title="Editar" type="button">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onClick="DeletarUsuario(' . $arrData[$i]['id'] . ')" title="Eliminar" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            ';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function GetUsuario($id)
    {
        $intId = intval(strClean($id));

        if ($intId > 0) {
            $arrData = $this->model->selectUsuario($intId);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => "Usuário não existe");
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function delUsuario()
    {
        $intId = intval(strClean($_POST['id']));

        $request = $this->model->deleteUsuario($intId);

        if ($request == "ok") {
            $arrResponse = array('status' => true, 'msg' => 'Usuário excluído com sucesso');
        } else {
            if ($request == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Não é possível excluir, há Pedido associada ao Usuário');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Não foi possível excluir os dados');
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
