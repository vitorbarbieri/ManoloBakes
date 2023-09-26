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
}
