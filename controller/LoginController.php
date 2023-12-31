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

                        $arrData = $this->model->SessionLogin($_SESSION['idUser']);

                        sessionUser($_SESSION['idUser']);
                        // $_SESSION['userData'] = $arrData;

                        $arrResponse = array('status' => true, 'msg' => "ok");
                    } else {
                        $arrResponse = array('status' => false, 'msg' => "Usuário inativo");
                    }
                }
            }
            sleep(1.5);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function ResetPass()
    {
        if ($_POST) {
            if (empty($_POST['txtEmailReset'])) {
                $arrResponse = array('status' => false, 'msg' => "Erro de dados");
            } else {
                $token = token();
                $strUsuario = strtolower(strClean($_POST['txtEmailReset']));
                $arrData = $this->model->GetUserEmail($strUsuario);

                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => "Usuário não existe");
                } else {
                    $id = $arrData['id'];
                    $nomeCompleto = $arrData['nome'] . ' ' .  $arrData['sobrenome'];

                    $url_recovery = base_url() . "/Login/ConfirmUser/" . $strUsuario . "/" . $token;

                    $requestUpdate = $this->model->SetTokenUser($id, $token);

                    $dataUsuario = array(
                        'nomeUsusario' => $strUsuario,
                        'email' => $strUsuario,
                        'assunto' => 'Recuperar conta - ' . NOME_REMETENTE,
                        'url_recovery' => $url_recovery
                    );
                    if ($requestUpdate) {
                        $sendEmail = sendEmail($dataUsuario, 'email_cambioPassword');

                        if ($sendEmail) {
                            $arrResponse = array('status' => true, 'msg' => "Foi enviado um e-mail a sua conta para trocar de senha");
                        } else {
                            $arrResponse = array('status' => false, 'msg' => "Não foi possível enviar o e-mail, tente mais tarde");
                        }
                    } else {
                        $arrResponse = array('status' => false, 'msg' => "Não foi possível realziar o processo, tente mais tarde");
                    }
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function ConfirmUser(string $params)
    {
        if (empty($params)) {
            header('location: ' . base_url());
        } else {
            $arrParams = explode(',', $params);
            $email = strClean($arrParams[0]);
            $token = strClean($arrParams[1]);

            $arrResponse = $this->model->GetUsuario($email, $token);

            if (empty($arrResponse)) {
                header('location: ' . base_url());
            } else {
                $data['page_tag'] = "Trocar senha";
                $data['page_title'] = "Trocar Senha";
                $data['page_name'] = "trocar_senha";
                $data['email'] = $email;
                $data['token'] = $token;
                $data['page_functions_js'] = "functionsLogin.js";
                $data['id'] = $arrResponse['id'];

                $this->views->getView($this, "CambiarPassword", $data);
            }
        }
        die();
    }

    public function SetPassword()
    {
        if ($_POST) {
            if (empty("idUsuario") || empty("txtPassword") || empty("txtPasswordConfirm") || empty("txtEmail") || empty("txtToken")) {
                $arrResponse = array('status' => false, 'msg' => 'Erro de dados');
            } else {
                $intIdPessoa = intval($_POST['idUsuario']);
                $strPassword = strClean($_POST['txtPassword']);
                $strPasswordConfirm = strClean($_POST['txtPasswordConfirm']);
                $strEmail = strClean($_POST['txtEmail']);
                $strToken = strClean($_POST['txtToken']);

                if ($strPassword != $strPasswordConfirm) {
                    $arrResponse = array('status' => false, 'msg' => 'As senhas não são iguais');
                } else {
                    $arrResponse = $this->model->GetUsuario($strEmail, $strToken);
                    if (empty($arrResponse)) {
                        $arrResponse = array('status' => false, 'msg' => 'Erro de dados');
                    } else {
                        $requestPass = $this->model->InsertPassword($intIdPessoa, $strPassword);

                        if ($requestPass) {
                            $arrResponse = array('status' => true, 'msg' => 'Senha atualziada com sucesso');
                        } else {
                            $arrResponse = array('status' => false, 'msg' => 'Não foi possível atualizar a senha, tente mais tarde');
                        }
                    }
                }
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
