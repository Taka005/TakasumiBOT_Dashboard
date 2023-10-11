<?php
require_once __DIR__."/discord.php";
$config = require_once __DIR__."/../config.php";

Oauth($config["clientId"],$config["secretId"],$config["redirectURL"]);
getUser();
getGuilds();

header("Location: ../");
exit;
?>