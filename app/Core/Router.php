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
        }
    }

    public function executeRoute(array $path, Request $request, Response $response) {
        $controller = new $path["controller"];
        return $controller->{$path['method']}($request, $response);
    }
}