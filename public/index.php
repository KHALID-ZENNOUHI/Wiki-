<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_SERVER['REQUEST_METHOD'];

$route = require_once "manageroute.php";

try {
    $router = $route->check($uri, $method);
} catch (\Exception $e) {
    http_response_code(404);
    echo "404 Page Not Found: " . $e->getMessage();
    exit;
}
$controller = new $router['controller']();
$action = $router['action'];
$controller->$action();
