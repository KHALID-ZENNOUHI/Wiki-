<?php
namespace App\Models;
use Core\Database;
use PDO;

class tag
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function display()
    {
        $stm = $this->db->getPDO()->query("SELECT * FROM `tags`");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($tag)
    {
        $stm = $this->db->getPDO()->prepare("INSERT INTO `tags`(tag) VALUES (:tag)");
        $stm->bindValue(':tag', $tag, PDO::PARAM_STR);
        $stm->execute();
    }

    public function update($tag, $id)
    {
        $stm = $this->db->getPDO()->prepare("UPDATE `tags` SET `tag` = :tag WHERE `id` = :id");
        $stm->bindValue(':tag', $tag, PDO::PARAM_STR);
        $stm->bindVAlue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    }

    public function delete($id)
    {
        $stm = $this->db->getPDO()->prepare("DELETE FROM `tags` WHERE id = :id");
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    }
}