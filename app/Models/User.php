<?php

require_once __DIR__ . '/../../core/Model.php';

class User extends Model 
{
    public function authenticate($email, $senha) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($senha === $user['senha']) {
                return $user;
            }
        }
        
        return false;
    }
}
