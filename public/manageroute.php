<?php
use Core\Route;
use App\Controllers\homeController;
use App\Controllers\AuthController;
use App\Controllers\adminController\categorieController;

$route = new Route();

$route->get('/', homeController::class, 'home');
$route->get('/register', homeController::class, 'register');
$route->get('/login', homeController::class, 'login');
$route->post('/register', AuthController::class, 'register');
$route->post('/login', AuthController::class, 'login');
$route->get('/categories', categorieController::class, 'dispaly');
$route->post('/addcategorie', categorieController::class, 'add');
$route->post('/updatecategorie', categorieController::class, 'update');
$route->get('/deleteCategorie', categorieController::class, 'delete');
$route->get('/tags', homeController::class, 'tags');





return $route;