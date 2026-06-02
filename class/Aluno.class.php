<?php

class Aluno extends CRUD {
    protected $table = 'Aluno';

    private $id;
    private $nome;

    private $celular;

    private $email;

    private $fkusuario;
    private $logradouro;
    private $cidade;

    private $cep;
    private $sexo;
    private $nascimento;
    private $estado;
    
    
    public function add() {
        // Implementação para adicionar um novo aluno
        $sql = "INSERT INTO $this->table (nome, celular, email) VALUES (:nome, :celular, :email)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":celular", $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":fkusuario", $this->fkusuario, PDO::PARAM_INT);
        $stmt->bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
        $stmt->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
        $stmt->bindParam(":cep", $this->cep, PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_STR);
        $stmt->bindParam(":nascimento", $this->nascimento, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $this->estado, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function update() {
        // Implementação para atualizar um aluno
        $sql = "UPDATE $this->table SET nome = :nome, celular = :celular, email = :email, fkusuario = :fkusuario, logradouro = :logradouro, cidade = :cidade, cep = :cep, sexo = :sexo, nascimento = :nascimento, estado = :estado WHERE idAluno = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":celular", $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":fkusuario", $this->fkusuario, PDO::PARAM_INT);
        $stmt->bindParam(":logradouro", $this->logradouro, PDO::PARAM_STR);
        $stmt->bindParam(":cidade", $this->cidade, PDO::PARAM_STR);
        $stmt->bindParam(":cep", $this->cep, PDO::PARAM_STR);
        $stmt->bindParam(":sexo", $this->sexo, PDO::PARAM_STR);
        $stmt->bindParam(":nascimento", $this->nascimento, PDO::PARAM_STR);
        $stmt->bindParam(":estado", $this->estado, PDO::PARAM_STR);
        return $stmt->execute();
    }

    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function get() {
        return $this->nome;}

    public function setNome($nome) {
        $this->nome = $nome;    }

    public function getCelular() {
        return $this->celular;  }

    public function setCelular($celular) {
        $this->celular = $celular;    }     

    public function getEmail() {
        return $this->email;    }

    public function setEmail($email) {
        $this->email = $email;    }

    public function getFkusuario() {
        return $this->fkusuario;    }   
    
    public function setFkusuario($fkusuario) {
        $this->fkusuario = $fkusuario;    }
    public function getLogradouro() {
        return $this->logradouro;    }  

    public function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;    }
    public function getCidade() {
        return $this->cidade;    }

    public function setCidade($cidade) {
        $this->cidade = $cidade;    }

    public function getCep() {
        return $this->cep;    }

    public function setCep($cep) {
        $this->cep = $cep;    }

    public function getSexo() {
        return $this->sexo;    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;    }

    public function getNascimento() {
        return $this->nascimento;    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;    }
    public function getEstado() {
        return $this->estado;    }

    public function setEstado($estado) {
        $this->estado = $estado;    }
}