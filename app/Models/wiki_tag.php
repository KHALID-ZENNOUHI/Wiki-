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

    public function add($idTag)
    {
        $idWiki = $this->db->getPDO()->lastInsertId();
        $stm = $this->db->getPDO()->prepare("INSERT INTO `wikis_tags`(id_wiki, id_tag) VALUES (:id_wiki,:id_tag)");
        $stm->bindValue(':id_wiki', $idWiki, PDO::PARAM_INT);
        $stm->bindValue(':id_tag', $idTag, PDO::PARAM_INT);
        $stm->execute();
    }
}