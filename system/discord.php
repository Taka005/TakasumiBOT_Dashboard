<?php
require_once __DIR__."/../lib/request.php";
require_once __DIR__."/../lib/db.php";
require_once __DIR__."/../lib/utils.php";

session_start();

function OauthURL($clientId,$redirectURL,$scope){
    return "https://discordapp.com/oauth2/authorize?response_type=code&client_id=".$clientId."&redirect_uri=".$redirectURL."&scope=".$scope;
}

function Oauth($clientId,$secretId,$redirectURL){
    if(!isset($_GET["code"])) return;

    $res = POST(
        "https://discordapp.com/api/oauth2/token",
        array(
            "client_id"=>$clientId,
            "client_secret"=>$secretId,
            "grant_type"=>"authorization_code",
            "code"=>$_GET["code"],
            "redirect_uri"=>$redirectURL
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
        DB::query("INSERT INTO account (id, ip, time) VALUES(".$res["id"].",'".$_SERVER["REMOTE_ADDR"]."',NOW()) ON DUPLICATE KEY UPDATE id = VALUES (id),ip = VALUES (ip),time = VALUES (time);"); 
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

    if($_SESSION["guild"][$guildId]) return $_SESSION["guild"][$guildId];

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

function getChannels($guildId){
    if(!isset($guildId)) return;

    if($_SESSION["channels"][$guildId]) return $_SESSION["channels"][$guildId];


    $res = GET(
        "https://discordapp.com/api/guilds/".$guildId."/channels",
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bot ".$config["token"]
        )
    );

    $_SESSION["channels"][$guildId] = $res;

    return $res;
}

function getMember($guildId,$userId){
    if(!isset($guildId)||!isset($userId)) return;

    if($_SESSION["members"][$guildId][$userId]) return $_SESSION["members"][$guildId][$userId];

    $res = GET(
        "https://discordapp.com/api/guilds/".$guildId."/members/".$userId,
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bot ".$config["token"]
        )
    );

    $_SESSION["members"][$guildId][$userId] = $res;

    return $res;
}

function getRoles($guildId){
    if(!isset($guildId)) return;

    if($_SESSION["roles"][$guildId]) return $_SESSION["roles"][$guildId];

    $res = GET(
        "https://discordapp.com/api/guilds/".$guildId."/roles",
        array(
            "Content-Type: application/x-www-form-urlencoded",
            "Authorization: Bot ".$config["token"]
        )
    );

    $_SESSION["roles"][$guildId] = $res;

    return $res;
}
?>