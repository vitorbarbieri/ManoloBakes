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
}
