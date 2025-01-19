<?php 

class Classe {
    public static function getClassAttributes(Object $obj) {
        $attributes =  [];
        foreach(get_class_vars(get_class($obj)) as $key => $value) {
            array_push($attributes,  $key);
        }

        return $attributes;
    }
}