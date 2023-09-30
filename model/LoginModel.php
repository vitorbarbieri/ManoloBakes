<?php

class LoginModel extends Mysql
{
    private $login;
    private $senha;

	public function __construct()
	{
		parent::__construct();
	}

    public function LoginUser(string $login, string $senha)
    {
        $this->login = $login;
        $this->senha = $senha;

        $sql = "SELECT id, status FROM pessoa WHERE email = '$this->login' AND senha = '$this->senha'";
		$request = $this->select($sql);
		return $request;
    }
}
