<?php
namespace App\Models;
use PDO;
use Core\Database;

class wiki_tag
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function add($idWiki, $idTag)
    {
        $stm = $this->db->getPDO()->prepare("INSERT INTO `wikis_tags`(id_wiki, id_tag) VALUES (:id_wiki, :id_tag)");
        $stm->bindValue(':id_wiki', $idWiki, PDO::PARAM_INT);
        $stm->bindValue(':id_tag', $idTag, PDO::PARAM_INT);
        $stm->execute();
    }

    public function update($idWiki, $idTag)
    {
        $stm = $this->db->getPDO()->prepare("UPDATE `wikis_tags` SET  id_tag = :id_tag WHERE id_wiki = :id_wiki");
        $stm->bindValue(':id_wiki', $idWiki, PDO::PARAM_INT);
        $stm->bindValue(':id_tag', $idTag, PDO::PARAM_INT);
        $stm->execute();
    }

    public function displayWikiTags($idWiki)
    {
        $stm = $this->db->getPDO()->query("SELECT tag FROM wikis_tags JOIN tags ON wikis_tags.id_tag = tags.id WHERE wikis_tags.id_wiki = $idWiki;");
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }

}