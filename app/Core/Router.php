<?php 

class Router {
    private Request $request;
    private Response $response;
    private $routes = [];

    public function __contruct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }

    
    public function render(array $route, Request $request) {
        $controllerClassName = ucfirst($route["controller"]) . "Controller";
        $method = $route["method"];

        $controller = new $controllerClassName();
        $controller->{$method}($request);
    }

    public function get(string $path, array $callback) {
        $this->routes["get"][$path] = $callback;
    }

    public function post(string $path, array $callback) {
        $this->routes["post"][$path] = $callback;
    }

    public function showRoutes() : void {
        var_dump($this->routes);
    }
}