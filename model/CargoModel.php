<?php

class CargoModel extends Mysql
{
    public $intId;
    public $strCargo;
	public $strDescricao;
	public $intStatus;

	public function __construct()
	{
		parent::__construct();
	}

    public function selectCargos()
    {
        $sql = "SELECT * FROM cargo";
        $request = $this->select_all($sql);
        return $request;
    }

	public function selectCargo(int $id)
    {
		$this->intId = $id;
        $sql = "SELECT * FROM cargo WHERE id = $this->intId";
        $request = $this->select($sql);
        return $request;
    }

    public function insertCargo(string $cargo, string $descricao, int $status)
    {
        $this->strCargo = $cargo;
		$this->strDescricao = $descricao;
		$this->intStatus = $status;

		$sql = "SELECT * FROM cargo WHERE nome = '{$this->strCargo}'";
		$request = $this->select($sql);

		if (empty($request)) {
			$sql = "INSERT INTO cargo (nome, descricao, status) VALUES (?, ?, ?)";
			$arrData = array($this->strCargo, $this->strDescricao, $this->intStatus);
			$request = $this->insert($sql, $arrData);
			$return = $request;
		} else {
			$return = "exist";
		}
		return $return;
    }

	public function updateCargo(int $id, string $cargo, string $descricao, int $status)
	{
        $this->intId = $id;
        $this->strCargo = $cargo;
		$this->strDescricao = $descricao;
		$this->intStatus = $status;

		$sql = "SELECT * FROM cargo WHERE id = '{$this->intId}'";
		$request = $this->select($sql);

		if (!empty($request)) {
			$sql = "UPDATE cargo SET nome = ?, descricao = ?, status = ? WHERE id = $this->intId";
			$arrData = array($this->strCargo, $this->strDescricao, $this->intStatus);
			$request = $this->update($sql, $arrData);
			return $request;
		}
	}

	public function deleteCargo(int $id)
	{
		$this->intId = $id;

		$sql = "SELECT * FROM pessoa WHERE id_cargo = $this->intId";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "DELETE FROM cargo WHERE id = $this->intId";
			$request = $this->delete($sql); // Refer-se ao método DELETE do arquivo MySql
			if ($request) {
				$request = "ok";
			} else {
				$request = "error";
			}
			
		} else {
			$request = "exist";
		}

		return $request;
	}
}