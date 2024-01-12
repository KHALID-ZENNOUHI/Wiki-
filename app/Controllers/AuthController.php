<?php
namespace App\Controllers;
use App\Models\user;
use App\Controllers\homeController;
use App\Models\wiki;
use App\Models\tag;
use App\Models\categorie;

class AuthController extends homeController
{
    public $user;
    public $wiki;
    public $tag;
    public $categorie;

    public function __construct()
    {
        $this->user = new user();
        $this->wiki = new wiki();
        $this->tag = new tag();
        $this->categorie = new categorie();
    }

    public function login()
    {
        extract($_POST);
        $nameRegix = '/^[a-zA-Z]{5,}$/';
        $emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
        if (!preg_match($emailRegex, $email) && !preg_match($nameRegix,$name)) {
            $_SESSION['error'] = "Invalid name or email format";
            $this->render('login');
            return;
        }
        $login = $this->user->getUserByEmail($email, $password);
        if ($login && password_verify($password,$login->password)) {
            $_SESSION['id'] = $login->id;
            $_SESSION['name'] = $login->name;
            $_SESSION['role'] = $login->role;
            if ($login->role === "auteur") {
                $wikis = $this->wiki->displayByIdUser();
                $this->render('clients/home',['wikis'=> $wikis]);
            }else {
                $wikiCount = $this->wiki->countWiki();
                $categorieCount = $this->categorie->countCategorie();
                $tagCount = $this->tag->countTag();
                $userCount = $this->user->countUser();
                $this->render('admin/dashboard', ['wikiCount' => $wikiCount, 'userCount' => $userCount, 'tagCount' => $tagCount, 'categorieCount' => $categorieCount]);
            }
        }else {
            $_SESSION['error'] = "Your email or password is incorrect";
            $this->render('login');
        }
    }

    public function register()
    {
        extract($_POST);
        $nameRegix = '/^[a-zA-Z]{5,}$/';
        $emailRegex = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/';
        if (!preg_match($emailRegex, $email) && !preg_match($nameRegix,$name)) {
            $_SESSION['error'] = "Invalid name or email format";
            $this->render('register');
            return;
        }
        $register = $this->user->getUserByEmail($email, $password);
        if ($register) {
            $_SESSION['error'] = "this email is already existed";
            $this->render('register');
        }elseif ($cpassword === $password) {
            $this->user->insertUser($name, $email, $password);
            $this->render('login');
        }else {
            $_SESSION['error'] = "The passwords you entered don't match";
            $this->render('register');
        }
        
    }

    public function logout(){
        session_destroy();
        $wikis = $this->wiki->display();
        $this->render('clients/home',['wikis'=> $wikis]);
    }
}
