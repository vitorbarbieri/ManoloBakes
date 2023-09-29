<?php

class UsuarioModel extends Mysql
{
    private $intId;
    private $strCpf;
    private $strNome;
    private $strSobrenome;
    private $strTelefone;
    private $strEmail;
    private $strSenha;
    private $intCargo;
    private $dateCadastro;
    private $intStatus;
    private $strToken;

    public function __construct()
    {
        parent::__construct();
    }

    public function insertUsuario(string $cpf, string $nome, string $sobrenome, string $tel, string $email, int $cargo, int $status, string $senha)
    {
        $this->strCpf = $cpf;
        $this->strNome = $nome;
        $this->strSobrenome = $sobrenome;
        $this->strTelefone = $tel;
        $this->strEmail = $email;
        $this->strSenha = $senha;
        $this->intCargo = $cargo;
        $this->intStatus = $status;

        $sql = "SELECT * FROM pessoa WHERE identificacao = '{$this->strCpf}'";
		$request = $this->select($sql);

		if (empty($request)) {
			$sql = "INSERT INTO pessoa (identificacao, nome, sobrenome, telefone, email, senha, id_cargo, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$arrData = array($this->strCpf, $this->strNome, $this->strSobrenome, $this->strTelefone, $this->strEmail, $this->strSenha, $this->intCargo, $this->intStatus);
			$request = $this->insert($sql, $arrData);
			$return = $request;
		} else {
			$return = "exist";
		}
		return $return;
    }
}
