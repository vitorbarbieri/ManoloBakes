<?php

class CargoModel extends Mysql
{
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

    public function insertCargo(string $cargo, string $descricao, int $status)
    {
        $this->strCargo = $cargo;
		$this->strDescricao = $descricao;
		$this->intStatus = $status;

		$sql = "SELECT * FROM cargo WHERE nome = '{$this->strCargo}'";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$query_insert = "INSERT INTO cargo (nome, descricao, status) VALUES (?, ?, ?)";
			$arrData = array($this->strCargo, $this->strDescricao, $this->intStatus);
			$request = $this->insert($query_insert, $arrData);
			$return = $request;
		} else {
			$return = "exist";
		}
		return $return;
    }
}