<?php
require_once __DIR__."/discord.php";

Oauth();
getUser();
getGuilds();

header("Location: ../");
exit;
?>