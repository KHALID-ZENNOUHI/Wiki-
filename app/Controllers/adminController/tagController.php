<?php
namespace App\Controllers\adminController;
use App\Models\tag;
use App\Controllers\homeController;

class tagController extends homeController
{
    public $tag;
    public function __construct()
    {
        $this->tag = new tag();
    }

    public function display()
    {
        $tags = $this->tag->display();
        $this->render('admin/tags',['tags' => $tags]);
    }

    public function add()
    {
        extract($_POST);
        $this->tag->add($tag);
        header('location: /tags');
    }

    public function update()
    {
        extract($_POST);
        $this->tag->update($tag, $id);
        header('location: /tags');
    }

    public function delete()
    {
        $id = $_GET['id'];
        $this->tag->delete($id);
        header('location: /tags');
    }

    
}