<?php

require_once 'classes/Conexao.php';

//DAO = DATA ACCESS OBJECT (OBJETO DE ACESSO A DADOS)

class AdminDAO
{
    public function login(Admin $admin)
    {
        $pdo = Conexao::getConnection();

        try {
            $sql = "SELECT * FROM admin WHERE user = :USER AND pass = :PASS";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':USER', $admin->getUser());
            $stmt->bindValue(':PASS', $admin->getPass());
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $_SESSION['admin'] = $stmt->fetch(PDO::FETCH_ASSOC);
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getMessage();
        }
    }
} 