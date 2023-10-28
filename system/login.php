<?php
require_once __DIR__."/discord.php";
$config = require_once __DIR__."/../config.php";

Oauth();
getUser();
getGuilds();

header("Location: ../");
exit;
?>