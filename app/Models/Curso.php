<?php

require_once __DIR__ . '/../../core/Model.php';

class Curso extends Model 
{
    public function listarCursos()
    {
        $sql = "SELECT id, titulo, descricao, data_criacao FROM cursos ORDER BY data_criacao DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarCurso($titulo, $descricao)
    {
        $sql = "INSERT INTO cursos (titulo, descricao) VALUES (:titulo, :descricao)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        return $stmt->execute();
    }

    public function deletarCurso($id)
    {
        $sql = "DELETE FROM cursos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function buscarCursoPorId($id)
    {
        $sql = "SELECT * FROM cursos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizarCurso($id, $titulo, $descricao)
    {
        $sql = "UPDATE cursos SET titulo = :titulo, descricao = :descricao WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}
