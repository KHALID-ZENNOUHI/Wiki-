<?php
use Core\Route;
use App\Controllers\Client_view_controller;

$route = new Route();

$route->get('/', Client_view_controller::class, 'home');




return $route;