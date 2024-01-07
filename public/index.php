<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use Core\Route;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];

$route = new Route();

try {
    $router = $route->check($uri, $method);
} catch (Exception $e) {
    http_response_code();
    echo "404 page not founde" . $e->getMessage();
    echo "<br>" . "Requested URI: " . $uri . "<br>";
    // echo "Defined Routes: " . json_encode($route->route);
    exit;
}
$controller = new $router['controller']();
$controller->$router['action']();
