<?php

class CargoController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cargo()
    {
        $data['page_id'] = 3;
        $data['page_tag'] = "Cargos - Manolo Bakes";
        $data['page_title'] = "Cargos de Usuário";
        $data['page_name'] = "Cargo";
        $this->views->getView($this, "cargo", $data);
    }

    public function getCargos()
    {
        $arrData = $this->model->selectCargos();

        for ($i = 0; $i < count($arrData); $i++) {
            if ($arrData[$i]['status'] == 1) {
                $arrData[$i]['status'] = '<span class="badge badge-success">Ativo</span>';
            } else {
                $arrData[$i]['status'] = '<span class="badge badge-danger">Inativo</span>';
            }

            $arrData[$i]['opcao'] = '
                <div class="text-center">
                    <button class="btn btn-secondary btn-sm" onClick="PermissaoCargo(' . $arrData[$i]['id'] . ')" title="Permissão" type="button">
                        <i class="fa-solid fa-key"></i>
                    </button>
                    <button class="btn btn-primary btn-sm" onClick="EditarCargo(' . $arrData[$i]['id'] . ')" title="Editar" type="button">
                        <i class="fa-solid fa-pencil"></i>
                    </button>
                    <button class="btn btn-danger btn-sm" onClick="DeletarCargo(' . $arrData[$i]['id'] . ')" title="Eliminar" type="button">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            ';
        }

        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function getCargo(int $id)
    {
        $intId = intval(strClean($id));

        if ($intId > 0) {
            $arrData = $this->model->selectCargo($intId);
            if (empty($arrData)) {
                $arrResponse = array('status' => false, 'msg' => "Cargo não existe");
            } else {
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function GetSelectCargos()
    {
        $htmlOptions = "";
        $arrData = $this->model->selectCargos();
        if (count($arrData) > 0) {
            for ($i = 0; $i < count($arrData); $i++) {
                $htmlOptions .= '<option value="' . $arrData[$i]['id'] . '">' . $arrData[$i]['nome'] . '</option>';
            }
        }
        echo $htmlOptions;
        die();
    }

    public function setCargo()
    {
        $indId = intval(strClean($_POST['idCargo']));
        $strCargo = strClean($_POST['txtNome']);
        $strDescricao = strClean($_POST['txtDescricao']);
        $intStatus = strClean($_POST['listStatus']);

        if ($indId == 0) {
            $request = $this->model->insertCargo($strCargo, $strDescricao, $intStatus);
            $option = 1;
        } else {
            $request = $this->model->updateCargo($indId, $strCargo, $strDescricao, $intStatus);
            $option = 2;
        }

        if ($request || is_numeric($request) && $request > 0) {
            if ($option == 1) {
                $arrResponse = array('status' => true, 'msg' => 'Dados guardados corretamente');
            } else {
                $arrResponse = array('status' => true, 'msg' => 'Dados atualizados corretamente');
            }
        } else {
            if ($request == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Atenção, o cargo já existe');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Não foi possível salvar os dados');
            }
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delCargo()
    {
        $intId = intval(strClean($_POST['id']));

        $request = $this->model->deleteCargo($intId);

        if ($request == "ok") {
            $arrResponse = array('status' => true, 'msg' => 'Dado excluído com sucesso');
        } else {
            if ($request == 'exist') {
                $arrResponse = array('status' => false, 'msg' => 'Não é possível excluir, há Usuário associada ao Cargo');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Não foi possível excluir os dados');
            }
        }

        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }
}
