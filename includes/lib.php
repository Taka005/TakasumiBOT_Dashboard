<?php
function is_animated($image){
	$ext = substr($image, 0, 2);
	if($ext == "a_"){
		return ".gif";
	}else{
		return ".png";
	}
}

function id($n){
    $random = substr(str_shuffle("abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZY0123456789"),0,$n);
    return $random;
}

function sql($query){
    $database = require __DIR__."/../database.php";
    $pdo = new PDO("mysql:host=".$database["server"].";dbname=".$database["name"].";charset=utf8",$database["user"],$database["password"]);
    $res = $pdo->query($query);
    return $res;
}
?>