<?php
namespace App\Models;
use Core\Database;
use PDO;
class user
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getUserByEmail($email, $password)
    {
        $stm = $this->db->getPDO()->prepare("SELECT * FROM users WHERE email = :email");
        $stm->bindParam(':email', $email, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch(PDO::FETCH_OBJ);
    }

    public function insertUser($name, $email, $password)
    {
        $stm = $this->db->getPDO()->prepare("INSERT INTO users(name, email, role, password) VALUES (:name,:email,:role,:password)");
        $stm->bindValue(':name', $name, PDO::PARAM_STR);
        $stm->bindValue(':email', $email, PDO::PARAM_STR);
        $stm->bindValue(':role', 'auteur', PDO::PARAM_STR);
        $stm->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $stm->execute();
    }

}