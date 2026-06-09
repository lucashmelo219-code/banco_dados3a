<?php

class Usuario extends CRUD {
    protected $table = 'Usuario';

    private int $id;
    private $nome;
    private $email;
    private $senha;

    private $tipo;
    private $ativo;


    public function add() {
        // Implementação para adicionar um novo usuário
        $sql = "INSERT INTO $this->table (nome, email, senha, tipo, ativo) VALUES (:nome, :email, :senha, :tipo, :ativo)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(":ativo", $this->ativo, PDO::PARAM_BOOL);
        return $stmt->execute();
        $this->id = $this->db->lastInsertId();
        return true;
    }
    
    public function update() {
        // Implementação para atualizar um usuário
        $sql = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, tipo = :tipo, ativo = :ativo WHERE idUsuario = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":senha", $this->senha, PDO::PARAM_STR);
        $stmt->bindParam(":tipo", $this->tipo, PDO::PARAM_STR);
        $stmt->bindParam(":ativo", $this->ativo, PDO::PARAM_BOOL);
        return $stmt->execute();
    }

    
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function getAtivo() {
        return $this->ativo;
    }
    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
    public function getTipo() {
        return $this->tipo;
    }
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }


}