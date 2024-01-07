<?php
namespace App\Controllers;
use App\Controllers\ViewController;

class Client_view_controller extends ViewController{

    public function home(){
        $this->renderClient('home');
    }
}