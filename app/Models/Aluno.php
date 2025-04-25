<?php

require_once __DIR__ . '/../../core/Model.php';

class Aluno extends Model 
{
    public function buscarAlunos($nome, $email) {
        $sql = "SELECT * FROM alunos WHERE 1=1";
    
        $params = [];
    
        if (!empty($nome)) {
            $sql .= " AND nome LIKE :nome";
            $params[':nome'] = '%' . $nome . '%';
        }
    
        if (!empty($email)) {
            $sql .= " AND email LIKE :email";
            $params[':email'] = '%' . $email . '%';
        }
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarAluno($nome, $email, $data_nascimento) {
        $sql = "INSERT INTO alunos (nome, email, data_nascimento) VALUES (:nome, :email, :data_nascimento)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_nascimento', $data_nascimento);
        $stmt->execute();
    }

    public function removerAluno($id) {
        $sql = "DELETE FROM alunos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function buscarAlunoPorId($id) {
        $sql = "SELECT * FROM alunos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function atualizarAluno($id, $nome, $email, $data_nascimento) {
        $sql = "UPDATE alunos SET nome = :nome, email = :email, data_nascimento = :data_nascimento WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':data_nascimento', $data_nascimento);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
