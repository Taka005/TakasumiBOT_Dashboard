<?php
require_once __DIR__."/../system/discord.php";
require_once __DIR__."/../config.php";
require_once __DIR__."/../system/lib.php";

if(!isset($_SESSION["user"])&&!isset($_SESSION["guilds"])){
    header("Location: ".url($client_id,$redirect_url,$scopes));
}

if(!isset($_GET["server"])){
    header("Location: ../");
}else{
    $guild = get_guild(htmlspecialchars($_GET["server"]),$token)
    if(!isset($guild)){
        header("Location: ../");
    }
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

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand text-darl" href="./">
                        <img src="../assets/img/takasumibot.png" alt="ロゴ" width="30" height="30" class="d-inline-block align-text-top">
                        TakasumiBOT
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" href="https://takasumibot.taka.ml" target="_blank">公式サイト</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="https://bot.taka.ml" target="_blank">導入</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="https://status.taka.ml" target="_blank">ステータス</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="https://discord.taka.ml" target="_blank">サポートサーバー</a>
                            </li>
                        </ul>   
                    </div>
                    <form class="d-flex">
                        <?php if(!isset($_SESSION["user"])){ ?>
                            <a class="btn btn-outline-success" href="<?= url($client_id,$redirect_url,$scopes) ?>" role="button">ログイン</a>
                        <?php }else{ ?>
                            <div class="dropdown">
                                <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= $_SESSION["username"]."#".$_SESSION["discrim"] ?>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="../account">アカウント</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="../system/logout">ログアウト</a></li>
                                    <li><a class="dropdown-item text-primary" href="<?= url($client_id,$redirect_url,$scopes) ?>">データ同期</a></li>
                                </ul>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </nav>
        </header>
	    <main>
            <div class="container">
                
            </div>
	    </main>
        <script src="../assets/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>