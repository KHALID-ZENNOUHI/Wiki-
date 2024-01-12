<?php
namespace App\Controllers;
use App\Controllers\controller;
use App\Models\categorie;
use App\Models\tag;
use App\Models\wiki;
use App\Models\wiki_tag;
use App\Models\user;

class homeController extends controller
{
    public $wiki;
    public $categories;
    public $tags;
    public $wiki_tag;
    public $user;
    public function __construct()
    {
        $this->wiki = new wiki();
        $this->categories = new categorie();
        $this->tags = new tag();
        $this->wiki_tag = new wiki_tag();
        $this->user = new user();
    }

    public function home()
    {
        if (isset($_SESSION['id'])) {
            $wikis = $this->wiki->displayByIdUser();
        }else {
            $wikis = $this->wiki->display();
        }
        $this->render('clients/home', ['wikis' => $wikis]);
    }

    public function dashboard()
    {
        $wikiCount = $this->wiki->countWiki();
        $categorieCount = $this->categories->countCategorie();
        $tagCount = $this->tags->countTag();
        $userCount = $this->user->countUser();
        $this->render('admin/dashboard', ['wikiCount' => $wikiCount, 'userCount' => $userCount, 'tagCount' => $tagCount, 'categorieCount' => $categorieCount]);
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
        if (isset($_GET['id'])) {

            $selectedCategorie = $this->wiki->displayCategorieWiki($_GET['id']);
            $selectedTags = [];
            $categories = $this->categories->display();
            $tags = $this->tags->display();
            $wiki = $this->wiki->displayByIdWiki($_GET['id']);
            foreach($this->wiki_tag->displayWikiTags($_GET['id']) as $selectedTag)
            {
                $selectedTags[] = $selectedTag->tag;
            }
            $this->render('clients/wikiadd', ['categories' => $categories, 'tags' => $tags, 'selectedCategorie' => $selectedCategorie, 'selectedTags' => $selectedTags, 'wiki' => $wiki]);

        }else {

            $categories = $this->categories->display();
            $tags = $this->tags->display();
            $this->render('clients/wikiadd', ['categories' => $categories, 'tags' => $tags]);

        }
    }

    public function wikicontent()
    {
        $idWiki = $_GET['id'];
        $wiki = $this->wiki->displayByIdWiki($idWiki);
        $tags = $this->wiki_tag->displayWikiTags($idWiki);
        $categorie = $this->wiki->displayCategorieWiki($idWiki);
        $this->render('clients/wikicontent', ['wiki' => $wiki, 'tags' => $tags, 'categorie' => $categorie]);
    }
}