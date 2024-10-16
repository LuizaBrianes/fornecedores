<?php
// Padrão SINGLETON
class Conexao
{
    private static $dsn = 'mysql:host=localhost;dbname=fabrica';
    private static $username = 'root';
    private static $password = '';
    public static $conn = null; // Conexão (objeto PDO)



    public static function getConnection()
    {
        if (empty(self::$conn)) {
            try {
                self::$conn = new PDO(self::$dsn, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Erro: ' . $e->getMessage();
            }
        } 
                
        return self::$conn;
    }
}