<?php
use Core\Route;
use App\Controllers\homeController;
use App\Controllers\AuthController;
use App\Controllers\adminController\categorieController;
use App\Controllers\adminController\tagController;
use App\Controllers\clientsController\wikiController;

$route = new Route();

$route->get('/', homeController::class, 'home');
$route->get('/register', homeController::class, 'register');
$route->get('/login', homeController::class, 'login');
$route->get('/logout', AuthController::class, 'logout');
$route->post('/register', AuthController::class, 'register');
$route->post('/login', AuthController::class, 'login');
$route->get('/categories', categorieController::class, 'display');
$route->post('/addcategorie', categorieController::class, 'add');
$route->post('/updatecategorie', categorieController::class, 'update');
$route->get('/deleteCategorie', categorieController::class, 'delete');
$route->get('/tags', tagController::class, 'display');
$route->post('/addtag', tagController::class, 'add');
$route->post('/updatetag', tagController::class, 'update');
$route->get('/deletetag', tagController::class, 'delete');
$route->get('/viewWikiadd', homeController::class, 'viewWikiadd');
$route->post('/addwiki', wikiController::class, 'add');





return $route;