<?php

class LoginController extends Controller
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['login'])) {
            header('location: ' . base_url() . '/dashboard');
        }
        
        parent::__construct();
    }

    public function login()
    {
        $data['page_tag'] = "Login - Manolo Bakes";
        $data['page_title'] = "Manolo Bakes";
        $data['page_name'] = "Login";
        $data['page_functions_js'] = "functionsLogin.js";
        $this->views->getView($this, "login", $data);
    }

    public function LoginUser()
    {
        if ($_POST) {
            if (empty($_POST['txtEmail']) || empty($_POST['txtPassword'])) {
                $arrResponse = array('status' => false, 'msg' => "Erro de dados");
            } else {
                $strUsuario = strtolower(strClean($_POST['txtEmail']));
                $strPassword = $_POST['txtPassword'];
                $requestUser = $this->model->LoginUser($strUsuario, $strPassword);

                if (empty($requestUser)) {
                    $arrResponse = array('status' => false, 'msg' => "Dados informados estão incorreta");
                } else {
                    $arrData = $requestUser;
                    if ($arrData['status'] == 1) {
                        $_SESSION['idUser'] = $arrData['id'];
                        $_SESSION['login'] = true;
                        $arrResponse = array('status' => true, 'msg' => "ok");
                    } else {
                        $arrResponse = array('status' => false, 'msg' => "Usuário inativo");
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
