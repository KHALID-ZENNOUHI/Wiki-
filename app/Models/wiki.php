<?php
namespace App\Models;
use Core\Database;
use PDO;
use App\Models\wiki_tag;

class Wiki
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function display()
    {
        $stm = $this->db->getPDO()->query("SELECT * FROM wikis ORDER BY id DESC");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function displayById()
    {
        $idUser  = $_SESSION['id'];
        $stm = $this->db->getPDO()->query("SELECT * FROM wikis  where id_user = $idUser ORDER BY id DESC");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

    public function add($title, $description, $contenue, $idCategorie, $image, $tagIds)
    {
        $stm = $this->db->getPDO()->prepare("INSERT INTO wikis(title, description, contenue, id_user, id_categorie, update_at, delete_at, image_path) VALUES (:title, :description, :contenue, :id_user, :id_categorie, :update_at, :delete_at, :image_path)");
        $stm->bindValue(':title', $title, PDO::PARAM_STR);
        $stm->bindValue(':description', $description, PDO::PARAM_STR);
        $stm->bindValue(':contenue', $contenue, PDO::PARAM_STR);
        $stm->bindValue(':id_user', $_SESSION['id'], PDO::PARAM_INT);
        $stm->bindValue(':id_categorie', $idCategorie, PDO::PARAM_INT);
        $stm->bindValue(':update_at', date('Y-m-d'), PDO::PARAM_STR);
        $stm->bindValue(':delete_at', date('Y-m-d'), PDO::PARAM_STR);
        $stm->bindValue(':image_path', $image, PDO::PARAM_STR);
        $stm->execute();

        $idWiki = $this->db->getPDO()->lastInsertId();
        $wiki_tag = new wiki_tag();
        foreach ($tagIds as $tagId) {
            $wiki_tag->add($idWiki, $tagId);
        }
    }


    public function update($id, $title, $description, $contenue, $idCategorie, $image)
    {
        $stm = $this->db->getPDO()->prepare("UPDATE wikis SET title = :title, description = :description, contenue = :contenue, id_categorie = :id_categorie, update_at = :update_at, image_path = :image_path WHERE id = :id");
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->bindValue(':title', $title, PDO::PARAM_STR);
        $stm->bindValue(':description', $description, PDO::PARAM_STR);
        $stm->bindValue(':contenue', $contenue, PDO::PARAM_STR);
        $stm->bindValue(':id_categorie', $idCategorie, PDO::PARAM_INT);
        $stm->bindValue(':update_at', date('Y-m-d'), PDO::PARAM_STR);
        $stm->bindValue(':image_path', $image, PDO::PARAM_STR);
        $stm->execute();
    }

    public function delete($id)
    {
        $stm = $this->db->getPDO()->prepare("DELETE FROM wikis WHERE id = :id");
        $stm->bindValue(':id', $id, PDO::PARAM_INT);
        $stm->execute();
    }

}