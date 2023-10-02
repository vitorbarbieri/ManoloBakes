<?php

class PermissaoController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        session_start();
        if (!$_SESSION['login']) {
            header('location: ' . base_url() . '/login');
        }
    }

    public function getPermissoesCargo(int $id)
    {
        $idCargo = intval(strClean($id));

        if ($idCargo > 0) {
            $arrModulos = $this->model->selectModulos();
            $arrPermissoesCargo = $this->model->selectPermissaoCargo($idCargo);
            $arrPermissao = array('consultar' => 0, 'alterar' => 0);
            $arrPermissaoCargo = array('idCargo' => $idCargo);

            if (empty($arrPermissoesCargo)) {
                for ($i = 0; $i < count(($arrModulos)); $i++) {
                    $arrModulos[$i]['permissao'] = $arrPermissao;
                }
            } else {
                for ($i = 0; $i < count(($arrModulos)); $i++) {
                    $arrPermissao = array('consultar' => 0, 'alterar' => 0);
                    if (isset($arrPermissoesCargo[$i])) {
                        $arrPermissao = array(
                            'consultar' => $arrPermissoesCargo[$i]['consultar'],
                            'alterar' => $arrPermissoesCargo[$i]['alterar']
                        );
                    }
                    // if ($arrModulos[$i]['id'] == $arrPermissoesCargo[$i]['id_modulo']) {
                        $arrModulos[$i]['permissao'] = $arrPermissao;
                    // }
                }
            }
            $arrPermissaoCargo['modulos'] = $arrModulos;
            $html = getModal("PermissaoModal", $arrPermissaoCargo);
        }
        die();
    }

    public function setPermissao()
    {
        if ($_POST) {
            $intIdCargo = intval($_POST['idCargo']);
            $modulos = $_POST['modulos'];

            foreach ($modulos as $modulo) {
                $idModulo = intval($modulo['id']);
                $consultar = empty($modulo['consultar']) ? 0 : 1;
                $alterar = empty($modulo['alterar']) ? 0 : 1;

                $requestPermiso = $this->model->selectPermissao($intIdCargo, $idModulo);
                if ($requestPermiso) {
                    $requestPermiso = $this->model->updatePermissao($intIdCargo, $idModulo, $consultar, $alterar);
                } else {
                    $requestPermiso = $this->model->insertPermissao($intIdCargo, $idModulo, $consultar, $alterar);
                }
                
                // Deve ser validado cada execução, para no final mostrar se tudo foiOK ou NOK
            }

            if ($requestPermiso > 0) {
                $arrResponse = array('status' => true, 'msg' => "Permissões atribuidas corretamente");
            } else {
                $arrResponse = array('status' => false, 'msg' => "Não foi possível atribuir as permissões");
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}