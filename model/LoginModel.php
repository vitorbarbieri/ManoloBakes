<?php

class LoginModel extends Mysql
{
    private $idUser;
    private $login;
    private $senha;
    private $token;

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

    public function SessionLogin($idUser)
    {
        $this->idUser = $idUser;

        // Buscar cargo
        $sql = "SELECT p.id,
                       p.identificacao,
                       p.nome,
                       p.sobrenome,
                       p.telefone,
                       p.email,
                       p.nome_fiscal,
                       p.endereco_fiscal,
                       c.id as 'id_cargo',
                       c.nome as 'nome_cargo',
                       p.status
                FROM pessoa p
                INNER JOIN cargo c ON c.id = p.id_cargo
                WHERE p.id = $this->idUser";
        $request = $this->select($sql);
        $_SESSION['userData'] = $request;
        return $request;
    }

    public function GetUserEmail(string $email)
    {
        $this->login = $email;
        $sql = "SELECT id,
                       nome,
                       sobrenome,
                       status
                FROM pessoa
                WHERE email = '$this->login'
                AND status = 1";
        $request = $this->select($sql);
        return $request;
    }

    public function SetTokenUser(int $id, string $token)
    {
        $this->idUser = $id;
        $this->token = $token;
        $sql = "UPDATE pessoa SET token = ? WHERE id = $this->idUser";
        $arrData = array($this->token);
        $request = $this->update($sql, $arrData);
        return $request;
    }

    public function GetUsuario($email, $token)
    {
        $this->login = $email;
        $this->token = $token;

        $sql = "SELECT id FROM pessoa WHERE email = '$this->login' AND token = '$this->token' AND status = 1";
        $request = $this->select($sql);
        return $request;
    }

    public function InsertPassword($id, $senha)
    {
        $this->idUser = $id;
        $this->senha = $senha;

        $sql = "UPDATE pessoa SET senha = ?, token = ? WHERE id = $this->idUser";
        $arrData = array($this->senha, "");
        $request = $this->update($sql, $arrData);
        return $request;
    }
}
