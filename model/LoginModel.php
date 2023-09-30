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
        return $request;
    }
}
