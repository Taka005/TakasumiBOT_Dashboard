<?php
require_once __DIR__."/system/discord.php";

if(!$_SESSION["token"]){
    header("Location: ".OauthURL());
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TakasumiBOT</title>

        <link rel="apple-touch-icon" type="image/png" sizes="180x180" href="./assets/img/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="180x180" href="../assets/img/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../assets/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="1024x1024" href="../assets/img/takasumibot.png">

        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>

    </body>
    <script src="../assets/js/script.js"></script>
</html>