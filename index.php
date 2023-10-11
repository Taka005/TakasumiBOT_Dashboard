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
        <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon-16x16.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="180x180" href="./assets/img/apple-touch-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="./assets/img/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="1024x1024" href="./assets/img/takasumibot.png">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
       
    </body>
    <script src="../assets/js/script.js"></script>
</html>