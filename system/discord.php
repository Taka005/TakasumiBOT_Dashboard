<?php
require_once __DIR__."/../lib/request.php";
require_once __DIR__."/../lib/db.php";
require_once __DIR__."/../lib/utils.php";

$config = require_once __DIR__."../config.php";

session_start();

function OauthURL(){
    return "https://discordapp.com/oauth2/authorize?response_type=code&client_id=".$config["clientId"]."&redirect_uri=".$config["redirectURL"]."&scope=".$config["scope"];
}

function Oauth(){
    if(!isset($_GET["code"])) return;

    $res = POST(
        "https://discordapp.com/api/oauth2/token",
        array(
            "client_id"=>$config["clientId"],
            "client_secret"=>$config["secretId"],
            "grant_type"=>"authorization_code",
            "code"=>$_GET["code"],
            "redirect_uri"=>$config["redirectURL"]
        )
    );

    $_SESSION["token"] = $res["access_token"];

    return $res;
}

function getUser(){
    if(!isset($_SESSION["token"])) return;

    $res = GET(
        "https://discordapp.com/api/users/@me",
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bearer ".$_SESSION["token"]
        )
    );

    $_SESSION["username"] = $res["username"];
    $_SESSION["userId"] = $res["id"];
    $_SESSION["avatar"] = !empty($res["avatar"]) ? "https://cdn.discordapp.com/avatars/".$res["id"]."/".$res["avatar"].animate($res["avatar"]) : "https://cdn.discordapp.com/embed/avatars/0.png";

    if($res["id"]){
        db::query("INSERT INTO account (id, ip, time) VALUES(".$res["id"].",'".$_SERVER["REMOTE_ADDR"]."',NOW()) ON DUPLICATE KEY UPDATE id = VALUES (id),ip = VALUES (ip),time = VALUES (time);"); 
    }

    return $res;
}

function getGuilds(){
    if(!isset($_SESSION["token"])) return;

    $res = GET(
        "https://discordapp.com/api/users/@me/guilds",
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bearer ".$_SESSION["token"]
        )
    );

    $_SESSION["guilds"] = $res;

    return $res;
}

function getGuild($guildId){
    if(!isset($guildId)) return;

    $res = GET(
        "https://discordapp.com/api/guilds/".$guildId,
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bot ".$config["token"]
        )
    );

    $_SESSION["guild"][$guildId] = $res;

    return $res;
}
?>