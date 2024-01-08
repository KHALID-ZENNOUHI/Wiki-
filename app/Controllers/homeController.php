<?php
namespace App\Controllers;
use App\Controllers\controller;

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
}