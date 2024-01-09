<?php
namespace App\Controllers\adminController;
use App\Models\categorie;
use App\Controllers\homeController;

class categorieController extends homeController
{
    public $categorie;
    public function __construct()
    {
        $this->categorie = new categorie();
    }

    public function dispaly()
    {
        $categories = $this->categorie->display();
        // dump($categories);
        // die();
        $this->render('admin/categories', ['categories' => $categories]);

    }

    public function add()
    {
        extract($_POST);
        $this->categorie->add($categorie, $description);
        header('location:/categories');
    }

    public function update()
    {
        extract($_POST);
        $this->categorie->update($categorie, $description, $id);
        header('location:/categories');
    }
    
    public function delete()
    {
        $id = $_GET['id'];
        $this->categorie->delete($id);
        header('location:/categories');
    }
}