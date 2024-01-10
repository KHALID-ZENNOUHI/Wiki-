<?php
namespace App\Controllers;
use App\Controllers\controller;
use App\Models\categorie;
use App\Models\tag;

class homeController extends controller
{
    
    public function home()
    {
        $this->render('clients/home');
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
        $Ocategories = new categorie();
        $Otags = new tag();
        $categories = $Ocategories->display();
        $tags = $Otags->display();
        $this->render('clients/wikiadd', ['categories' => $categories, 'tags' => $tags]);
    }
}