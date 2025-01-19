<?php 

class Router {
    private $routes = [];

    public function __contruct(Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }


    public function routing(Request $request, Response $response) {
        $path = $request->getPath();
        $method = $request->getMethod();

        if ($method == 'get') {
            $this->executeRoute($path, $request, $response);
        }

        if ($method == 'post') {
            $model = $this->request->getModel();
            var_dump($model);
        }
    }

    public function executeRoute(array $path, Request $request, Response $response) {
        $controller = new $path["controller"];
        return $controller->{$path['method']}($request, $response);
    }
    
    // public function render(array $route, Request $request) : void {
    //     $controllerClassName = ucfirst($route["controller"]) . "Controller";
    //     $method = $route["method"];

    //     $controller = new $controllerClassName();
    //     $controller->{$method}($request);

    //     echo "Test";
    // }

    // public function get(string $path, array $callback): void {
    //     $this->routes["get"][$path] = $callback;
    // }

    // public function post(string $path, array $callback): void {
    //     $this->routes["post"][$path] = $callback;
    // }

    // public function showRoutes() : void {
    //     var_dump($this->routes);
    // }
}