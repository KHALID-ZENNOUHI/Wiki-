<?php
namespace App\Controllers;

class Controller
{

    protected function render($view, $data = [])
    {
        extract($data);
        require_once __DIR__ . "/../../views/{$view}.php";
    }
    // protected function renderAdmin($view, $data = []){
    //     extract($data);
    //     require_once __DIR__ . "/../../views/admin/{$view}.php";
    // }
    // protected function renderAuth($view, $data = []){
    //     extract($data);
    //     require_once __DIR__ . "/../../views/{$view}.php";
    // }
}