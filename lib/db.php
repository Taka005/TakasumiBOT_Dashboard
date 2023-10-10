<?php
class DB{
    private static $pdo = null;

    public static function connect(){
        if(self::$pdo === null){
            $config = require_once __DIR__."/../config.php";
            self::$pdo = new PDO("mysql:host=".$config["db"]["host"].";dbname=".$config["db"]["name"].";charset=utf8mb4",$config["db"]["user"],$config["db"]["password"]);
        }
        return self::$pdo;
    }

    public static function query($query){
        $pdo = self::connect();
        $res = $pdo->query($query);
        return $res;
    }
}
?>