<?php 

class Dao { 
    


    public function find(array $params) {
        $this->insert($params);
        $subQuery = $this->generateQuery($params);
        $query = "SELECT * FROM " . $this->getTableName() . " WHERE " . $subQuery;


        echo $query;
    }

    public function generateQuery($params): string {
        if (count($params) > 1) {
            return $this->generateComplexQuery($params);
        } else if (count($params) > 0) {
            $key = array_key_first($params);
            if (gettype($params[$key]) == "integer" || gettype($params[$key]) == "double") {
                return $key ." = " . $params[$key];
            } else {
                return $key . " = '" . $params[$key] . "';";
            }
        }
    }

    public function generateComplexQuery($params) : string {
        $subQuery = [];
        foreach($params as $key => $value) {
            if (gettype($value) == "integer" || gettype($value) == "double") {
                array_push($subQuery , $key . " = " . $value);
            } else {
                array_push($subQuery , $key . " = '" . $value . "'");
            }
        }

        return implode(" AND " , $subQuery);
    }

    public function insert($params) : string {
        $columns = [];
        $values = [];
        foreach($params as $key => $value) {
            if (gettype($value) == "integer" || gettype($value) == "double") {
                array_push($columns, $key);
                array_push($values, $value);
            } else {
                array_push($columns, $key);
                array_push($values, "'" . $value . "'");
            }
        }
        var_dump($columns);
        var_dump($values);

        $query = "INSERT INTO " . $this->getTableName() . "(" .implode(" , " , $columns) . ") VALUES  (" . implode(" , " , $values ) . ")";
        var_dump($query);
        die();
        return [];
    }

}