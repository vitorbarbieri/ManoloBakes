<?php

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $data['page_tag'] = "Login - Manolo Bakes";
        $data['page_title'] = "Login";
        $data['page_name'] = "Login";
        $data['page_functions_js'] = "functionsLogin.js";
        $this->views->getView($this, "login", $data);
    }
}
