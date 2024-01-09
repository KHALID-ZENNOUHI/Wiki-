<?php
use Core\Route;
use App\Controllers\homeController;
use App\Controllers\AuthController;

$route = new Route();

$route->get('/', homeController::class, 'home');
$route->get('/register', homeController::class, 'register');
$route->get('/login', homeController::class, 'login');
$route->post('/register', AuthController::class, 'register');
$route->post('/login', AuthController::class, 'login');




return $route;