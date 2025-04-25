<?php

require_once __DIR__ . '/../../core/Model.php';

class Matricula extends Model 
{
    public function listarMatriculas()
    {
        $sql = "SELECT m.id, a.nome AS aluno_nome, m.data_matricula
                FROM matriculas m
                JOIN alunos a ON m.aluno_id = a.id
                ORDER BY m.data_matricula DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarAlunos()
    {
        $stmt = $this->db->query("SELECT id, nome FROM alunos ORDER BY nome");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarCursos()
    {
        $stmt = $this->db->query("SELECT id, titulo FROM cursos ORDER BY titulo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarMatricula($aluno_id, $curso_id)
    {
        $sql = "INSERT INTO matriculas (aluno_id, curso_id) VALUES (:aluno_id, :curso_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':aluno_id' => $aluno_id,
            ':curso_id' => $curso_id
        ]);
    }
}
