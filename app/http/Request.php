<?php 

class Request {
    
    public function getPath() {
        $requestURI = $_SERVER["REQUEST_URI"];
        
        if ($requestURI == '/') {
            return ["controller" => "Home", "method" => "index"];
        }

        $path = $this->resolvePath($requestURI);

        if (count($path) == 2) {
            return ["controller" => $path[0], "method" => $path[1]];
        }
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