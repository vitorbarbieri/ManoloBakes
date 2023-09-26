<?php

class CargoModel extends Mysql
{
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
}