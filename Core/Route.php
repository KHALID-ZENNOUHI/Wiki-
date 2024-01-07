<?php
namespace Core;

class Route{

    public $routes = [];

    public function add($method, $uri, $controller, $action){
        $this->routes[] = compact('method', 'uri', 'controller', 'action');
    }

    public function get($uri, $controller, $action){
        $this->add('GET', $uri, $controller, $action);
    }

    public function post($uri, $controller, $action){
        $this->add('POST', $uri, $controller, $action);
    }

    public function check($uri, $method){
        foreach ($this->routes as $route) {
            // Trim slashes for comparison
            $routeUri = trim($route['uri'], '/');
            $requestedUri = trim($uri, '/');
    
            if ($routeUri === $requestedUri && $route['method'] === strtoupper($method)) {
                return $route;
            }
        }
        // throw new \Exception('No route defined for this URI!');
        return null; // Return null if no matching route is found
    }
    

}