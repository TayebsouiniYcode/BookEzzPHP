<?php 

class Application {

    private Request $request;
    public Appication $application;
    
    
    public function __construct() {
        $this->router = new Router();
        $this->request = new Request();
    }

    public function request() : Request {
        return $this->request;
    }

    public function run() {
        $route = $this->resolveRoute();
    }

    public function resolveRoute() {
        $path = $this->request()->getPath();

        $this->router();

    }
}