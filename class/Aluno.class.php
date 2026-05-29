<?php

class Aluno extends CRUD {
    protected $table = 'Aluno';

    private $id;
    private $nome;

    private $celular;

    private $email;
    
    public function add() {
        // Implementação para adicionar um novo aluno
        $sql = "INSERT INTO $this->table (nome, celular, email) VALUES (:nome, :celular, :email)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":celular", $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function update() {
        // Implementação para atualizar um aluno
        $sql = "UPDATE $this->table SET nome = :nome, celular = :celular, email = :email WHERE idAluno = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->bindParam(":nome", $this->nome, PDO::PARAM_STR);
        $stmt->bindParam(":celular", $this->celular, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
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
    
}