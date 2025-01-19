<?php 

class Request {
    
    public function getPath() {
        var_dump($_SERVER["REQUEST_URI"]);
    }

    
}