<?php 

class Application {
    public static Application $app;
    public ?Router $router;
    public Request $request;
    public Response $response;

    public function __construct() {
        $this->router = new Router();
        $this->request = new Request();
        $this->response = new Response();
        self::$app = $this;
    }

    public function run() {
        $this->router->routing($this->request, $this->response);
    } 
}