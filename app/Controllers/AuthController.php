<?php
namespace App\Controllers;
use App\Models\user;
use App\Controllers\homeController;

class AuthController extends homeController
{
    public $user;

    public function __construct()
    {
        $this->user = new user();
    }

    public function login()
    {
        extract($_POST);
        $login = $this->user->getUserByEmail($email, $password);
        if ($login && password_verify($password,$login->password)) {
            $_SESSION['id'] = $login->password;
            $_SESSION['name'] = $login->name;
            $_SESSION['role'] = $login->role;
            if ($login->role === "auteur") {
                $this->render('clients/home');
            }else {
                $this->render('admin/dashboard');
            }
        }else {
            $_SESSION['error'] = "Your email or password is incorrect";
            $this->render('login');
        }
    }

    public function register()
    {
        extract($_POST);
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
        $this->render('login');
    }
}
