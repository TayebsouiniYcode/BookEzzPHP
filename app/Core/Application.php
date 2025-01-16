<?php 

class Application {
    public static ?Application $app = null;
    public Request $request;
    public Router $router;

    private function __construct() {
        $this->request = new Request();
        $this->router = new Router();
    }

    public static function run() {
        self::checkIsntance();

        (self::$app)->router->showRoutes();
    }

    private static function checkIsntance() {
        if (!self::$app) {
            self::$app = new self();
        }
    }

    public static function router() {
        return (self::$app)->router;
    }
}