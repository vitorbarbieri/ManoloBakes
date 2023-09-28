<?php

class PermissaoModel extends Mysql
{
    public $intIdCargo;
    public $intIdModulo;
    public $consultar;
    public $alterar;

    public function __construct()
    {
        parent::__construct();
    }

    public function selectModulos()
    {
        $sql = "SELECT * FROM modulo";
        $rquest = $this->select_all($sql);
        return $rquest;
    }

    public function selectPermissaoCargo(int $id)
    {
        $this->intIdCargo = $id;
        $sql = "SELECT * FROM permissao WHERE id_cargo = $this->intIdCargo";
        $rquest = $this->select_all($sql);
        return $rquest;
    }

    public function selectPermissao(int $idCargo, int $idModulo)
    {
        $this->intIdCargo = $idCargo;
        $this->intIdModulo = $idModulo;
        $sql = "SELECT * FROM permissao WHERE id_cargo = $this->intIdCargo AND id_modulo = $this->intIdModulo";
        $rquest = $this->select($sql);
        return $rquest;
    }

    public function deletePermissao($id)
    {
        $this->intIdCargo = $id;
        $sql = "DELETE FROM permissao WHERE id_cargo = $this->intIdCargo";
        $request = $this->delete($sql);
        return $request;
    }

    public function insertPermissao($idCargo, $idModulo, $consultar, $alterar)
    {
        $this->intIdCargo = $idCargo;
        $this->intIdModulo = $idModulo;
        $this->consultar = $consultar;
        $this->alterar = $alterar;

        $sql = "INSERT INTO permissao (id_cargo, id_modulo, consultar, alterar) VALUES (?, ?, ?, ?)";
        $arrData = array($this->intIdCargo, $this->intIdModulo, $this->consultar, $this->alterar);
        $request_insert = $this->insert($sql, $arrData);
        return $request_insert;
    }
    
    public function updatePermissao($idCargo, $idModulo, $consultar, $alterar)
    {
        $this->intIdCargo = $idCargo;
        $this->intIdModulo = $idModulo;
        $this->consultar = $consultar;
        $this->alterar = $alterar;

		$sql = "UPDATE permissao SET id_cargo = ?, id_modulo = ?, consultar = ?, alterar = ? WHERE id_cargo = $this->intIdCargo AND id_modulo = $this->intIdModulo";
        $arrData = array($this->intIdCargo, $this->intIdModulo, $this->consultar, $this->alterar);
		$request = $this->update($sql, $arrData); // Refer-se ao método UPDATE do arquivo MySql

		return $request;
    }
}
