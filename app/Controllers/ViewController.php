<?php
namespace App\Controllers;

class ViewController{

    protected function renderClient($view, $data = []){
        extract($data);
        require_once __DIR__ . "/../../views/clients/{$view}.php";
    }
    protected function renderAdmin($view, $data = []){
        extract($data);
        require_once __DIR__ . "/../../views/admin/{$view}.php";
    }
}