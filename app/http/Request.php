<?php 

class Request {
    
    public function getPath() {
        $requestURI = $_SERVER["REQUEST_URI"];
        
        if ($requestURI == '/') {
            return ["controller" => "HomeController", "method" => "index"];
        }

        $path = $this->resolvePath($requestURI);

        if (count($path) == 2) {
            return ["controller" => ucfirst($path[0]) . "Controller", "method" => $path[1]];
        }
    }

    public function getMethod() : string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getModel() {
        $class = array_key_first($_REQUEST);
        $model = new $class();

        $attr = Classe::getClassAttributes($model);

        foreach ($attr as $value) {
            $model->{$value} = $_REQUEST[$class][$value];
        }

        return $model;
    }

    private function resolvePath(string $path) : array{
        return explode("/",$this->deleteFirstChar($path));
    }

    private function deleteFirstChar(string $string) : string {
        return mb_substr($string, 1);
    }


}