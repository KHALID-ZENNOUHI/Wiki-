<?php
namespace App\Models;
use Core\Database;
use PDO;

class Categorie
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function display()
    {
        $stm = $this->db->getPDO()->query("SELECT * FROM `categories`");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($categorie, $description)
    {
        $stm = $this->db->getPDO()->prepare("INSERT INTO `categories`(`categorie`, `c_description`) VALUES (:categorie,:c_description)");
        $stm->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $stm->bindValue(':c_description', $description, PDO::PARAM_STR);
        $stm->execute();
    }

    public function update($categorie, $description, $id)
    {
        $stm = $this->db->getPDO()->prepare("UPDATE `categories` SET `categorie`= :categorie,`c_description`= :c_description WHERE id = :id");
        $stm->bindValue(':categorie', $categorie, PDO::PARAM_STR);
        $stm->bindValue(':c_description', $description, PDO::PARAM_STR);
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    }

    public function delete($id)
    {
        $stm = $this->db->getPDO()->prepare("DELETE FROM `categories` WHERE id = :id");
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    }

    public function countCategorie()
    {
        $stm = $this->db->getPDO()->query("SELECT COUNT(id) FROM `categories`");
        $stm->execute();
        return $stm->fetch(PDO::FETCH_OBJ);
    }
}