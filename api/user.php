<?php
require_once __DIR__."/../system/discord.php";

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

if($_SESSION["token"]){
    $data = getUser();
    if(!$data["message"]){
        $res["data"] = $data;
    }else{
        $res["error"] = $data["message"];
    }
}else{
    $res["error"] = "Not Authenticated";
}

print json_encode($res,JSON_UNESCAPED_SLASHES|JSON_PARTIAL_OUTPUT_ON_ERROR|JSON_UNESCAPED_UNICODE);
?>