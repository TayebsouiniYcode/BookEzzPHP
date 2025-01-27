<?php 

class MakeDatabase {
    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "";

    public static function up() {

    }

    private function ifExists() {
        try {
            $databaseConnection = new PDO(self::$servername, self::$username, self::$password);

        } catch (Exception $e) {

        }
    }
}