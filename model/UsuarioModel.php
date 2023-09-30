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

    public function insertUsuario(string $cpf, string $nome, string $sobrenome, string $tel, string $email, int $cargo, int $status, string $senha, $dataCriacao)
    {
        $this->strCpf = $cpf;
        $this->strNome = $nome;
        $this->strSobrenome = $sobrenome;
        $this->strTelefone = $tel;
        $this->strEmail = $email;
        $this->strSenha = $senha;
        $this->intCargo = $cargo;
        $this->dateCadastro = $dataCriacao;
        $this->intStatus = $status;

        $sql = "SELECT * FROM pessoa WHERE identificacao = '{$this->strCpf}'";
		$request = $this->select($sql);

		if (empty($request)) {
			$sql = "INSERT INTO pessoa (identificacao, nome, sobrenome, telefone, email, senha, id_cargo, data_criacao, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$arrData = array($this->strCpf, $this->strNome, $this->strSobrenome, $this->strTelefone, $this->strEmail, $this->strSenha, $this->intCargo, $this->dateCadastro, $this->intStatus);
			$request = $this->insert($sql, $arrData);
			$return = $request;
		} else {
			$return = "exist";
		}
		return $return;
    }

    public function updateUsuario(int $id, string $cpf, string $nome, string $sobrenome, string $tel, string $email, int $cargo, int $status, string $senha)
	{
        $this->intId = $id;
        $this->strCpf = $cpf;
        $this->strNome = $nome;
        $this->strSobrenome = $sobrenome;
        $this->strTelefone = $tel;
        $this->strEmail = $email;
        $this->strSenha = $senha;
        $this->intCargo = $cargo;
        $this->intStatus = $status;

        $sql = "SELECT * FROM pessoa WHERE id = $this->intId";
		$request = $this->select($sql);

		if (!empty($request)) {
			$sql = "UPDATE pessoa SET identificacao = ?, nome = ?, sobrenome = ?, telefone = ?, email = ?, senha = ?, id_cargo = ?, status = ? WHERE id = $this->intId";
			$arrData = array($this->strCpf, $this->strNome, $this->strSobrenome, $this->strTelefone, $this->strEmail, $this->strSenha, $this->intCargo, $this->intStatus);
			$request = $this->update($sql, $arrData);
			return $request;
		}
	}

    public function selectUsuarios()
    {
        $sql = "SELECT p.id, p.identificacao, p.nome, p.sobrenome, p.telefone, p.email, p.senha, p.status, c.nome as cNome FROM pessoa p INNER JOIN cargo c ON p.id_cargo = c.id";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectUsuario($id)
    {
        $this->intId = $id;
        $sql = "SELECT p.id, p.identificacao, p.nome, p.sobrenome, p.telefone, p.email, p.senha, p.status, c.nome as cNome, DATE_FORMAT(p.data_criacao, '%d/%m/%Y') as dataCadastro, c.id as idCargo
                FROM pessoa p
                INNER JOIN cargo c ON p.id_cargo = c.id
                WHERE p.id = $this->intId";
        $request = $this->select($sql);
        return $request;
    }

    public function deleteUsuario($id)
    {
		$this->intId = $id;

		$sql = "SELECT * FROM pedido WHERE id_pessoa = $this->intId";
		$request = $this->select_all($sql);

		if (empty($request)) {
			$sql = "DELETE FROM pessoa WHERE id = $this->intId";
			$request = $this->delete($sql); // Refer-se ao método DELETE do arquivo MySql
			if ($request) {
				$request = "ok";
			} else {
				$request = "error";
			}
			
		} else {
			$request = "exist";
		}

		return $request;
    }
}
