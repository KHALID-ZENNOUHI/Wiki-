<?php
namespace Core;

class Route{

    public $route = [];

    public function add($mthod, $uri, $controller, $action){
        $this->route[] = compact('method', 'uri', 'controller', 'action');
    }

    public function get($uri, $controller, $action){
        $this->add('GET', $uri, $controller, $action);
    }

    public function post($uri, $controller, $action){
        $this->add('POST', $uri, $controller, $action);
    }

    public function check($uri, $method){
        foreach ($this->route as $router) {
            if ($router['uri'] === $uri && $router['method'] === strtoupper($method)) {
                return $router;
            }
        }
        throw new \Exception('No route defined for this URI!');
    }

}