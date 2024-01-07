<?php
namespace App\Client_view_controller;
use ViewController;

class Client_view_controller extends ViewController{

    public function home(){
        $this->renderClient('home');
    }
}