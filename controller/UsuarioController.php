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
            $strIdentificacao = strClean($_POST['txtIdentificacao']);
            $strNome = ucwords(strClean($_POST['txtNome']));
            $strSobrenome = ucwords(strClean($_POST['txtSobrenome']));
            $strTelefone = strClean($_POST['txtTelefone']);
            $strEmail = strtolower(strClean($_POST['txtEmail']));
            $intCargo = intval(strClean($_POST['listCargo']));
            $intStatus = intval(strClean($_POST['listStatus']));
            $strSenha = strClean($_POST['txtSenha']);

            $request = $this->model->insertUsuario($strIdentificacao, $strNome, $strSobrenome, $strTelefone, $strEmail, $intCargo, $intStatus, $strSenha);

            if (is_numeric($request) && $request > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Informações salvas corretamente');
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
}
