<?php
use Core\Route;
use App\Controllers\homeController;

$route = new Route();

$route->get('/', homeController::class, 'home');
$route->get('register', homeController::class, 'register');




return $route;