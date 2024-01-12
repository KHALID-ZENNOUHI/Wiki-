<?php
namespace App\Controllers;
use App\Controllers\controller;
use App\Models\categorie;
use App\Models\tag;
use App\Models\wiki;

class homeController extends controller
{
    public $wiki;
    public $categories;
    public $tags;
    public function __construct()
    {
        $this->wiki = new wiki();
        $this->categories = new categorie();
        $this->tags = new tag();
    }

    public function home()
    {
        if (isset($_SESSION['id'])) {
            $wikis = $this->wiki->displayById();
        }else {
            $wikis = $this->wiki->display();
            // dump($wikis);
            // die();
        }
        $this->render('clients/home', ['wikis' => $wikis]);
    }
    public function register()
    {
        $this->render('register');
    }
    public function login()
    {
        $this->render('login');
    }
    public function categories()
    {
        $this->render('admin/categories');
    }
    public function tags()
    {
        $this->render('admin/tags');
    }
    public function viewWikiadd()
    {
        $categories = $this->categories->display();
        $tags = $this->tags->display();
        $this->render('clients/wikiadd', ['categories' => $categories, 'tags' => $tags]);
    }
}