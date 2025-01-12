<?php 

class Route {
    private static ?array $routes = [];

    private function __construct() {}

    public static function get(string $path, array $callback) {
        self::$routes['get'][$path] = $callback;
    }

    public static function post(string $path, array $callback) {
        self::$routes['post'][$path] = $callback;
    }
}